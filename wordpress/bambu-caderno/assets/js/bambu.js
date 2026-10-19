/* Bambu Caderno: comportamento do site (sem dependências, melhoria progressiva). */

(function () {
  "use strict";

  var dados = window.bambuSite || {};
  var WHATSAPP = dados.whatsapp || "5511940793838";
  var WHATSAPP_VISIVEL = dados.whatsappVisivel || "(11) 94079-3838";
  var movimentoReduzido = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ----- WhatsApp flutuante: no celular, só depois do hero ------------------- */

  var flutuante = document.querySelector(".wa-flutuante");
  var hero = document.querySelector(".hero");

  if (flutuante) {
    if (hero && "IntersectionObserver" in window) {
      new IntersectionObserver(function (entradas) {
        flutuante.classList.toggle("visivel", !entradas[0].isIntersecting);
      }).observe(hero);
    } else {
      flutuante.classList.add("visivel");
    }
  }

  /* ----- hastes de bambu: crescem uma vez quando a seção aparece ------------ */

  var bambu = document.querySelector(".secao-bambu");
  if (bambu) {
    if (movimentoReduzido || !("IntersectionObserver" in window)) {
      bambu.classList.add("crescer");
    } else {
      var obs = new IntersectionObserver(function (entradas) {
        if (entradas[0].isIntersecting) {
          bambu.classList.add("crescer");
          obs.disconnect();
        }
      }, { threshold: 0.35 });
      obs.observe(bambu);
    }
  }

  /* ----- menu: marca a página atual (os links do padrão são personalizados) ---- */

  var aqui = location.origin + location.pathname.replace(/\/?$/, "/");
  document.querySelectorAll(".nav-principal a.wp-block-navigation-item__content").forEach(function (link) {
    var url = new URL(link.href, location.href);
    if (url.hash) return; // âncoras da página inicial (#contato, #depoimentos) não são "página atual"
    var destino = url.origin + url.pathname.replace(/\/?$/, "/");
    if (destino === aqui && !link.hasAttribute("aria-current")) {
      link.setAttribute("aria-current", "page");
    }
  });

  /* ----- confirmação depois de enviar sem JS: leva o foco até ela ------------ */

  var confirmada = document.querySelector(".confirmacao[tabindex]");
  if (confirmada) confirmada.focus();

  /* ----- formulários --------------------------------------------------------- */

  var mensagensErro = {
    nome: "Como a gente pode te chamar?",
    whatsapp: "Falta o WhatsApp, com DDD, para a gente responder.",
    email: "Esse e-mail parece incompleto. Pode conferir?",
    para: "Escolha para quem é a aula.",
    interesse: "Escolha um curso, ou “Ainda não sei”.",
    contato: "Deixe um WhatsApp ou e-mail para a gente responder.",
    curriculo: "Envie o currículo em PDF, com até 5 MB.",
    video: "Esse link parece incompleto. Ele começa com https://?"
  };

  function primeiroNome(nome) {
    return (nome || "").trim().split(/\s+/)[0] || "";
  }

  function digitos(texto) {
    return (texto || "").replace(/\D/g, "");
  }

  function marcarErro(form, nome, ativo) {
    var campos = form.querySelectorAll('[name="' + nome + '"]');
    var caixa = form.querySelector("#" + form.dataset.prefixo + nome + "-erro");
    campos.forEach(function (c) {
      if (c.type !== "radio") c.setAttribute("aria-invalid", ativo ? "true" : "false");
    });
    if (caixa) caixa.textContent = ativo ? mensagensErro[nome] : "";
    return ativo;
  }

  // Regras por campo: devolvem true quando o campo está com problema.
  var regras = {
    nome: function (el) { return el.nome.value.trim().length < 2; },
    whatsapp: function (el) { return el.whatsapp.required && digitos(el.whatsapp.value).length < 10; },
    email: function (el) { return el.email.value.trim() !== "" && !el.email.checkValidity(); },
    para: function (el, form) { return !form.querySelector('[name="para"]:checked'); },
    interesse: function (el) { return el.interesse.value === ""; },
    video: function (el) { return el.video.value.trim() !== "" && !el.video.checkValidity(); },
    curriculo: function (el) {
      var arquivo = el.curriculo.files[0];
      return !arquivo || !/\.pdf$/i.test(arquivo.name) || arquivo.size > 5 * 1024 * 1024;
    },
    // Trabalhe conosco: basta um meio de contato
    contato: function (el, form) {
      if (form.dataset.formulario !== "trabalhe") return false;
      return !(digitos(el.whatsapp.value).length >= 10 || (el.email.value.trim() !== "" && el.email.checkValidity()));
    }
  };

  function confere(form, nome) {
    var el = form.elements;
    if (nome !== "contato" && !el[nome]) return false;
    return marcarErro(form, nome, regras[nome](el, form));
  }

  function validar(form) {
    var erros = Object.keys(regras).filter(function (nome) { return confere(form, nome); });
    if (erros.length) {
      var alvo = form.querySelector('[name="' + erros[0] + '"]') ||
        form.querySelector('[name="whatsapp"]');
      if (alvo) alvo.focus();
    }
    return erros.length === 0;
  }

  function textoConfirmacao(form) {
    var el = form.elements;
    var nome = primeiroNome(el.nome && el.nome.value);
    var saudacao = nome ? "Mensagem recebida, " + nome + "." : "Mensagem recebida.";

    if (form.dataset.formulario === "trabalhe") {
      return {
        titulo: nome ? "Obrigada, " + nome + "." : "Obrigada.",
        texto: "Seu currículo chegou aqui na Bambu. A gente lê com calma e, quando surgir uma vaga com o seu perfil, entra em contato."
      };
    }

    var whats = el.whatsapp && el.whatsapp.value.trim();
    var texto = "Ela já chegou aqui na Bambu. Alguém da escola vai te chamar" +
      (whats ? " no WhatsApp " + whats : "") +
      " para conversar com calma.";
    if (el.para) {
      var para = (form.querySelector('[name="para"]:checked') || {}).value;
      if (para === "Para meu filho ou filha") texto += " Se puder, já vá pensando nos dias e horários que funcionam para a sua família.";
      if (para === "Para uma escola") texto += " Se quiser adiantar, mande também o nome da escola e o segmento.";
    }
    return { titulo: saudacao, texto: texto };
  }

  function mostrarConfirmacao(form) {
    var c = textoConfirmacao(form);
    var caixa = document.createElement("div");
    caixa.className = "confirmacao";
    caixa.tabIndex = -1;

    var h = document.createElement("h3");
    h.textContent = c.titulo;
    var p = document.createElement("p");
    p.textContent = c.texto;
    caixa.append(h, p);

    if (form.dataset.formulario !== "trabalhe") {
      var p2 = document.createElement("p");
      p2.innerHTML = 'Com pressa? É só mandar um oi no <a class="link" href="https://wa.me/' + WHATSAPP + '">' + WHATSAPP_VISIVEL + "</a>.";
      caixa.append(p2);
    }

    var novo = document.createElement("button");
    novo.type = "button";
    novo.className = "wp-element-button";
    novo.textContent = "Enviar outra mensagem";
    novo.addEventListener("click", function () {
      form.reset();
      form.hidden = false;
      caixa.remove();
      form.querySelector("input").focus();
    });
    caixa.append(novo);

    form.hidden = true;
    form.after(caixa);
    caixa.focus();
  }

  function mostrarFalha(form) {
    var aviso = form.querySelector(".aviso-envio");
    if (!aviso) {
      aviso = document.createElement("p");
      aviso.className = "aviso-envio";
      aviso.setAttribute("role", "alert");
      form.querySelector(".formulario__enviar").before(aviso);
    }
    aviso.innerHTML = 'Não conseguimos enviar agora, desculpe. Pode tentar de novo daqui a pouco ou falar direto com a gente no WhatsApp <a class="link" href="https://wa.me/' + WHATSAPP + '">' + WHATSAPP_VISIVEL + "</a>.";
  }

  document.querySelectorAll("[data-formulario]").forEach(function (form) {
    form.dataset.prefixo = form.dataset.formulario === "trabalhe" ? "t-" : "c-";

    // Tira o aviso de erro enquanto a pessoa corrige o campo. Acontece durante a
    // digitação, e não ao sair do campo, para a página não pular no meio de um clique.
    function recheca(e) {
      var nome = e.target.name;
      if (!regras[nome]) return;
      var caixa = form.querySelector("#" + form.dataset.prefixo + nome + "-erro");
      if (caixa && caixa.textContent) confere(form, nome);
      var contato = form.querySelector("#" + form.dataset.prefixo + "contato-erro");
      if (contato && contato.textContent && (nome === "whatsapp" || nome === "email")) confere(form, "contato");
    }
    form.addEventListener("input", recheca);
    form.addEventListener("change", recheca);

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!validar(form)) return;

      var botao = form.querySelector('[type="submit"]');
      var rotulo = botao.textContent;
      botao.disabled = true;
      botao.textContent = "Enviando…";

      fetch(form.getAttribute("action"), { method: "POST", body: new FormData(form), headers: { Accept: "application/json", "X-Bambu-Ajax": "1" }, credentials: "same-origin" })
        .then(function (r) { return r.json().catch(function () { return {}; }); })
        .then(function (resposta) {
          if (resposta && resposta.success) { mostrarConfirmacao(form); return; }
          var erros = (resposta && resposta.data && resposta.data.erros) || [];
          // o servidor recusou algum campo: marca os mesmos campos que a validação daqui
          var marcados = erros.filter(function (nome) { return regras[nome] && marcarErro(form, nome, true); });
          if (!marcados.length) throw new Error("envio");
        })
        .catch(function () { mostrarFalha(form); })
        .finally(function () {
          botao.disabled = false;
          botao.textContent = rotulo;
        });
    });
  });
})();
