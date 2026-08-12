@extends('layout.app-public')
@section('content')

<!--
  COMPONENTE MDA — SOLICITAÇÃO DE SERVIÇO
  Sem sidebar, menu, navbar, <html>, <head> ou <body>.
  Insira este bloco dentro da área de conteúdo que já existe no seu sistema.
  Mantenha os três arquivos na mesma pasta ou ajuste os caminhos abaixo.
-->
<link rel="stylesheet" href="solicitacao-servico.css">

<main class="profile-page">
<section class="mda-sr" data-mda-sr>
  <svg class="mda-sr__sprite" aria-hidden="true">
    <symbol id="mda-sr-i-back" viewBox="0 0 24 24"><path d="M19 12H5m7 7-7-7 7-7"/></symbol>
    <symbol id="mda-sr-i-next" viewBox="0 0 24 24"><path d="M5 12h14m-7-7 7 7-7 7"/></symbol>
    <symbol id="mda-sr-i-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol>
    <symbol id="mda-sr-i-close" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
    <symbol id="mda-sr-i-service" viewBox="0 0 24 24"><path d="M14.7 6.3a4 4 0 0 0-5-5l2.1 2.1-2.4 2.4-2.1-2.1a4 4 0 0 0 5 5l7.2 7.2a2.1 2.1 0 0 1-3 3l-7.2-7.2a4 4 0 0 0-5 5l2.1-2.1 2.4 2.4-2.1 2.1a4 4 0 0 0 5-5"/></symbol>
    <symbol id="mda-sr-i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></symbol>
    <symbol id="mda-sr-i-map" viewBox="0 0 24 24"><path d="m3 6 6-3 6 3 6-3v15l-6 3-6-3-6 3V6Z"/><path d="M9 3v15m6-12v15"/></symbol>
    <symbol id="mda-sr-i-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4m8-4v4M3 10h18"/></symbol>
    <symbol id="mda-sr-i-money" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><circle cx="12" cy="12" r="3"/><path d="M6 9H5v1m13 5h1v-1"/></symbol>
    <symbol id="mda-sr-i-upload" viewBox="0 0 24 24"><path d="M12 16V4M7 9l5-5 5 5M5 20h14"/></symbol>
    <symbol id="mda-sr-i-file" viewBox="0 0 24 24"><path d="M6 2h8l4 4v16H6V2Z"/><path d="M14 2v5h5M9 13h6m-6 4h4"/></symbol>
    <symbol id="mda-sr-i-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 14h8l1-14"/></symbol>
    <symbol id="mda-sr-i-bolt" viewBox="0 0 24 24"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"/></symbol>
    <symbol id="mda-sr-i-drop" viewBox="0 0 24 24"><path d="M12 2S5 9 5 14a7 7 0 0 0 14 0c0-5-7-12-7-12Z"/></symbol>
    <symbol id="mda-sr-i-paint" viewBox="0 0 24 24"><path d="M12 22a10 10 0 1 1 10-10c0 2-1 3-3 3h-2a2 2 0 0 0-2 2c0 2-1 5-3 5Z"/><circle cx="8" cy="10" r=".6"/><circle cx="11" cy="7" r=".6"/><circle cx="16" cy="8" r=".6"/></symbol>
    <symbol id="mda-sr-i-hammer" viewBox="0 0 24 24"><path d="m15 12-8.5 8.5-3-3L12 9m-1-6 3-1 7 7-4 4-7-7 1-3Z"/></symbol>
    <symbol id="mda-sr-i-spark" viewBox="0 0 24 24"><path d="m12 3 1.2 3.8L17 8l-3.8 1.2L12 13l-1.2-3.8L7 8l3.8-1.2L12 3ZM5 14l.8 2.2L8 17l-2.2.8L5 20l-.8-2.2L2 17l2.2-.8L5 14Z"/></symbol>
    <symbol id="mda-sr-i-snow" viewBox="0 0 24 24"><path d="M12 2v20M4 6l16 12M20 6 4 18M8 4l4 3 4-3m-8 16 4-3 4 3"/></symbol>
  </svg>

  <header class="mda-sr__heading">
    <div>
      <button type="button" class="mda-sr__back" data-back>
        <svg><use href="#mda-sr-i-back"></use></svg> Voltar para solicitações
      </button>
      <h1>Solicite um serviço</h1>
      <p>Descreva sua necessidade e receba propostas de profissionais qualificados.</p>
    </div>
    <div class="mda-sr__trust">
      <span><svg><use href="#mda-sr-i-shield"></use></svg></span>
      <div><strong>Ambiente seguro</strong><small>Seus dados ficam protegidos</small></div>
    </div>
  </header>

  <nav class="mda-sr__stepper" aria-label="Etapas da solicitação">
    <button type="button" class="mda-sr__step is-current" data-step-button="1" aria-current="step">
      <span class="mda-sr__step-number">1</span><span><strong>Serviço</strong><small>Conte o que precisa</small></span><i></i>
    </button>
    <button type="button" class="mda-sr__step" data-step-button="2" disabled>
      <span class="mda-sr__step-number">2</span><span><strong>Local</strong><small>Onde será realizado</small></span><i></i>
    </button>
    <button type="button" class="mda-sr__step" data-step-button="3" disabled>
      <span class="mda-sr__step-number">3</span><span><strong>Agenda e valor</strong><small>Quando e quanto</small></span><i></i>
    </button>
    <button type="button" class="mda-sr__step" data-step-button="4" disabled>
      <span class="mda-sr__step-number">4</span><span><strong>Revisão</strong><small>Confira e publique</small></span>
    </button>
  </nav>

  <div class="mda-sr__notice" data-notice role="status" hidden>
    <span>!</span><p data-notice-text></p>
  </div>

  <div class="mda-sr__layout">
    <form class="mda-sr__form" data-form enctype="multipart/form-data" novalidate>
      <!-- ETAPA 1 — SERVIÇO -->
      <section class="mda-sr__panel" data-panel="1">
        <div class="mda-sr__section-title">
          <span><svg><use href="#mda-sr-i-service"></use></svg></span>
          <div><p>ETAPA 1 DE 4</p><h2>O que você precisa?</h2><small>Quanto mais detalhes, melhores serão as propostas recebidas.</small></div>
        </div>

        <fieldset>
          <legend>Escolha uma categoria <em>*</em></legend>
          <div class="mda-sr__categories" data-categories>
            <button type="button" class="mda-sr__category is-selected" data-id="1" data-name="Elétrica" data-icon="bolt">
              <span><svg><use href="#mda-sr-i-bolt"></use></svg></span><div><strong>Elétrica</strong><small>Instalações e reparos</small></div><i>✓</i>
            </button>
            <button type="button" class="mda-sr__category" data-id="2" data-name="Hidráulica" data-icon="drop">
              <span><svg><use href="#mda-sr-i-drop"></use></svg></span><div><strong>Hidráulica</strong><small>Vazamentos e encanamentos</small></div><i></i>
            </button>
            <button type="button" class="mda-sr__category" data-id="3" data-name="Pintura" data-icon="paint">
              <span><svg><use href="#mda-sr-i-paint"></use></svg></span><div><strong>Pintura</strong><small>Ambientes e acabamentos</small></div><i></i>
            </button>
            <button type="button" class="mda-sr__category" data-id="4" data-name="Montagem" data-icon="hammer">
              <span><svg><use href="#mda-sr-i-hammer"></use></svg></span><div><strong>Montagem</strong><small>Móveis e instalações</small></div><i></i>
            </button>
            <button type="button" class="mda-sr__category" data-id="5" data-name="Limpeza" data-icon="spark">
              <span><svg><use href="#mda-sr-i-spark"></use></svg></span><div><strong>Limpeza</strong><small>Residencial e comercial</small></div><i></i>
            </button>
            <button type="button" class="mda-sr__category" data-id="6" data-name="Climatização" data-icon="snow">
              <span><svg><use href="#mda-sr-i-snow"></use></svg></span><div><strong>Climatização</strong><small>Ar-condicionado e ventilação</small></div><i></i>
            </button>
          </div>
          <input type="hidden" name="categoria_id" value="1" data-category-input>
        </fieldset>

        <fieldset>
          <legend>Qual tipo de serviço?</legend>
          <div class="mda-sr__segmented" data-service-types>
            <button type="button" class="is-active" data-value="Instalação">✓ Instalação</button>
            <button type="button" data-value="Reparo">Reparo</button>
            <button type="button" data-value="Manutenção">Manutenção</button>
            <button type="button" data-value="Ainda não sei">Ainda não sei</button>
          </div>
          <input type="hidden" name="tipo_servico" value="Instalação" data-service-type-input>
        </fieldset>

        <div class="mda-sr__field">
          <label for="mda-sr-title">Título da solicitação <em>*</em></label>
          <small>Resuma em uma frase o serviço que precisa.</small>
          <input id="mda-sr-title" name="titulo" maxlength="80" value="Instalação de tomadas na cozinha" data-title required>
          <b data-title-count>32/80</b>
        </div>

        <div class="mda-sr__field">
          <label for="mda-sr-description">Descreva os detalhes <em>*</em></label>
          <small>Informe quantidades, medidas, materiais e qualquer detalhe importante.</small>
          <textarea id="mda-sr-description" name="descricao" maxlength="600" rows="6" data-description required>Preciso instalar três novas tomadas na cozinha. O imóvel é um apartamento e já possui conduítes próximos aos pontos desejados.</textarea>
          <b class="is-textarea" data-description-count>126/600</b>
        </div>

        <div class="mda-sr__field">
          <label for="mda-sr-files">Fotos e documentos <span>Opcional</span></label>
          <small>Imagens ajudam os profissionais a avaliar melhor o serviço.</small>
          <label class="mda-sr__upload" for="mda-sr-files">
            <span><svg><use href="#mda-sr-i-upload"></use></svg></span>
            <div><strong>Arraste os arquivos ou clique para selecionar</strong><small>JPG, PNG ou PDF • até 10 MB • máximo de 5</small></div>
            <b>Selecionar arquivos</b>
          </label>
          <input id="mda-sr-files" class="mda-sr__file-input" name="arquivos[]" type="file" multiple accept="image/png,image/jpeg,application/pdf" data-files>
          <div class="mda-sr__file-list" data-file-list hidden></div>
        </div>
      </section>

      <!-- ETAPA 2 — LOCAL -->
      <section class="mda-sr__panel" data-panel="2" hidden>
        <div class="mda-sr__section-title">
          <span><svg><use href="#mda-sr-i-map"></use></svg></span>
          <div><p>ETAPA 2 DE 4</p><h2>Onde será realizado?</h2><small>O endereço exato só será compartilhado após a contratação.</small></div>
        </div>

        <fieldset>
          <legend>Local do serviço <em>*</em></legend>
          <div class="mda-sr__choices" data-locations>
            <button type="button" class="mda-sr__choice is-selected" data-value="saved"><i></i><span>⌂</span><div><strong>Usar meu endereço cadastrado</strong><small>Rua das Palmeiras, 248 • Apto 64<br>Jardim Europa, São Paulo — SP</small></div><b>Principal</b></button>
            <button type="button" class="mda-sr__choice" data-value="other"><i></i><span>⌖</span><div><strong>Informar outro endereço</strong><small>Para um imóvel, empresa ou local diferente.</small></div></button>
            <button type="button" class="mda-sr__choice" data-value="remote"><i></i><span>⌁</span><div><strong>O serviço pode ser remoto</strong><small>Todo atendimento será feito on-line.</small></div></button>
          </div>
          <input type="hidden" name="tipo_local" value="saved" data-location-input>
        </fieldset>

        <div class="mda-sr__address" data-other-address hidden>
          <div class="mda-sr__field"><label>CEP <em>*</em></label><input name="cep" maxlength="9" placeholder="00000-000" data-cep></div>
          <div class="mda-sr__field is-wide"><label>Logradouro <em>*</em></label><input name="logradouro" placeholder="Rua, avenida..." data-street></div>
          <div class="mda-sr__field"><label>Número <em>*</em></label><input name="numero" placeholder="123" data-number></div>
          <div class="mda-sr__field is-wide"><label>Complemento</label><input name="complemento" placeholder="Apartamento, bloco, referência..." data-complement></div>
        </div>

        <div class="mda-sr__field">
          <label>Orientações de acesso <span>Opcional</span></label>
          <small>Informe regras de portaria, estacionamento ou outras orientações.</small>
          <textarea name="orientacoes_acesso" rows="4" placeholder="Ex.: É necessário apresentar documento na portaria..."></textarea>
        </div>
        <div class="mda-sr__privacy"><svg><use href="#mda-sr-i-shield"></use></svg><div><strong>Seu endereço está protegido</strong><p>Antes da contratação, profissionais verão somente o bairro e a cidade.</p></div></div>
      </section>

      <!-- ETAPA 3 — AGENDA E VALOR -->
      <section class="mda-sr__panel" data-panel="3" hidden>
        <div class="mda-sr__section-title">
          <span><svg><use href="#mda-sr-i-calendar"></use></svg></span>
          <div><p>ETAPA 3 DE 4</p><h2>Quando e quanto?</h2><small>Defina suas preferências. Você ainda poderá negociar com o profissional.</small></div>
        </div>

        <fieldset>
          <legend>Quando precisa do serviço? <em>*</em></legend>
          <div class="mda-sr__options" data-urgencies>
            <button type="button" data-value="O quanto antes"><i></i>O quanto antes</button>
            <button type="button" class="is-selected" data-value="Nesta semana"><i></i>Nesta semana</button>
            <button type="button" data-value="Próximos 15 dias"><i></i>Próximos 15 dias</button>
            <button type="button" data-value="Escolher uma data"><i></i>Quero escolher uma data</button>
          </div>
          <input type="hidden" name="urgencia" value="Nesta semana" data-urgency-input>
        </fieldset>
        <div class="mda-sr__field" data-date-field hidden><label>Data preferencial</label><input type="date" name="data_preferencial"></div>

        <fieldset>
          <legend>Período preferencial</legend>
          <div class="mda-sr__segmented is-period" data-periods>
            <button type="button" class="is-active" data-value="Manhã">✓ Manhã</button>
            <button type="button" data-value="Tarde">Tarde</button>
            <button type="button" data-value="Noite">Noite</button>
            <button type="button" data-value="Qualquer horário">Qualquer horário</button>
          </div>
          <input type="hidden" name="periodo" value="Manhã" data-period-input>
        </fieldset>

        <fieldset>
          <legend>Como prefere definir o orçamento? <em>*</em></legend>
          <div class="mda-sr__budget-options" data-budget-options>
            <button type="button" data-value="open"><i></i><div><strong>Quero receber orçamentos</strong><small>Os profissionais sugerem o valor.</small></div></button>
            <button type="button" class="is-selected" data-value="range"><i></i><div><strong>Tenho uma faixa de valor</strong><small>Informe um orçamento aproximado.</small></div></button>
          </div>
          <input type="hidden" name="tipo_orcamento" value="range" data-budget-mode-input>
        </fieldset>

        <div class="mda-sr__money-row" data-budget-fields>
          <div class="mda-sr__field"><label>Valor mínimo</label><div class="mda-sr__money"><span>R$</span><input name="orcamento_minimo" value="250" data-budget-min></div></div>
          <span>até</span>
          <div class="mda-sr__field"><label>Valor máximo</label><div class="mda-sr__money"><span>R$</span><input name="orcamento_maximo" value="500" data-budget-max></div></div>
        </div>
        <div class="mda-sr__tip"><span>💡</span><div><strong>Uma faixa de valor realista aumenta suas chances</strong><p>Você não fará nenhum pagamento agora. O valor final será combinado depois.</p></div></div>
      </section>

      <!-- ETAPA 4 — REVISÃO -->
      <section class="mda-sr__panel mda-sr__review" data-panel="4" hidden>
        <div class="mda-sr__section-title">
          <span><svg><use href="#mda-sr-i-check"></use></svg></span>
          <div><p>ETAPA 4 DE 4</p><h2>Revise sua solicitação</h2><small>Confira as informações antes de publicar para os profissionais.</small></div>
        </div>
        <article class="mda-sr__review-card"><header><strong>Sobre o serviço</strong><button type="button" data-edit="1">Editar</button></header><dl><div><dt>Categoria</dt><dd data-review-category></dd></div><div><dt>Título</dt><dd data-review-title></dd></div><div class="is-full"><dt>Descrição</dt><dd data-review-description></dd></div><div><dt>Anexos</dt><dd data-review-files></dd></div></dl></article>
        <article class="mda-sr__review-card"><header><strong>Local do atendimento</strong><button type="button" data-edit="2">Editar</button></header><dl><div class="is-full"><dt>Endereço</dt><dd data-review-address></dd></div></dl></article>
        <article class="mda-sr__review-card"><header><strong>Agenda e orçamento</strong><button type="button" data-edit="3">Editar</button></header><dl><div><dt>Prazo</dt><dd data-review-urgency></dd></div><div><dt>Período</dt><dd data-review-period></dd></div><div><dt>Orçamento</dt><dd data-review-budget></dd></div></dl></article>
        <label class="mda-sr__consent"><input type="checkbox" data-terms checked><span>✓</span><p>Confirmo que as informações estão corretas e concordo com os <a href="#">Termos de Uso</a> e a <a href="#">Política de Privacidade</a>.</p></label>
      </section>

      <footer class="mda-sr__actions">
        <div><button type="button" class="mda-sr__button is-ghost" data-previous hidden>← Voltar</button><button type="button" class="mda-sr__text-button" data-draft>Salvar como rascunho</button></div>
        <button type="button" class="mda-sr__button is-primary" data-next>Continuar →</button>
        <button type="submit" class="mda-sr__button is-primary" data-publish hidden>✓ Publicar solicitação</button>
      </footer>
    </form>

    <aside class="mda-sr__summary">
      <div class="mda-sr__summary-card">
        <header><div><small>RESUMO</small><h3>Sua solicitação</h3></div><b>Rascunho</b></header>
        <div class="mda-sr__progress"><div><span>Preenchimento</span><strong data-progress-text>100%</strong></div><i><b data-progress-bar style="width:100%"></b></i></div>
        <div class="mda-sr__summary-service"><span><svg><use data-summary-icon href="#mda-sr-i-bolt"></use></svg></span><div><small data-summary-category>Elétrica</small><strong data-summary-title>Instalação de tomadas na cozinha</strong><em data-summary-type>Instalação</em></div></div>
        <div class="mda-sr__summary-details">
          <div><span><svg><use href="#mda-sr-i-map"></use></svg></span><p><small>Local</small><strong data-summary-location>Jardim Europa, São Paulo — SP</strong></p></div>
          <div><span><svg><use href="#mda-sr-i-calendar"></use></svg></span><p><small>Quando</small><strong data-summary-schedule>Nesta semana • Manhã</strong></p></div>
          <div><span><svg><use href="#mda-sr-i-money"></use></svg></span><p><small>Orçamento</small><strong data-summary-budget>R$ 250 — R$ 500</strong></p></div>
          <div><span><svg><use href="#mda-sr-i-file"></use></svg></span><p><small>Anexos</small><strong data-summary-files>Nenhum arquivo</strong></p></div>
        </div>
        <footer><svg><use href="#mda-sr-i-shield"></use></svg><p>Você poderá comparar perfis, avaliações e valores antes de contratar.</p></footer>
      </div>
      <div class="mda-sr__how"><span>?</span><div><h3>O que acontece depois?</h3><ol><li><b>1</b>Profissionais qualificados recebem sua solicitação.</li><li><b>2</b>Você compara propostas e avaliações.</li><li><b>3</b>Escolhe com segurança quem contratar.</li></ol></div></div>
    </aside>
  </div>

  <div class="mda-sr__modal" data-modal role="dialog" aria-modal="true" hidden>
    <div><button type="button" data-close aria-label="Fechar">×</button><span>✓</span><small>SOLICITAÇÃO PUBLICADA</small><h2>Tudo pronto!</h2><p>Sua solicitação foi preparada e está pronta para ser enviada ao backend.</p><b>#MDA-2026-0847</b><button type="button" class="mda-sr__button is-primary" data-close>Continuar</button></div>
  </div>
</section>
</main>

{{-- <script src="solicitacao-servico.js"></script> --}}
 

  @endsection