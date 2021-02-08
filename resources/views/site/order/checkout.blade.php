@extends('layout.app')

@section('head-links-scripts')

@endsection


@section('content')
<div class="main-container col1-layout checkout">
    <div class="container">
        <div class="banner-ebit">
        </div>
        <div class="col1-button grid-container">
            <div class="grid12-9 no-left-gutter text-wrapper">
                <h1>Pagamento</h1>
                <p>Confirme o endereço de entrega do seu pedido e selecione uma forma de pagamento.</p>
            </div>
            <div class="grid12-3 no-gutter btn-wrapper">
                <button onclick="OscGeral.initSalvarPedido();" class="btn-checkout button-top">Finalizar compra</button>
            </div>
        </div>
<div class="columns-container">
        <div class="col3-left">
            <div id="div_billing_address_form">
                <div class="osc-title">
                <span class="number">1</span><h2 class="title">Endereço de Cobrança</h2>
            </div>
            <form id="billing_address_form" novalidate="novalidate">
                <fieldset class="form_billing_fs field_pf">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_name">Nome<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_name" type="text" class="input-text osc_input billing_input billing_required required" name="billing[firstname]">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs field_pf">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_lastname">Sobrenome<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_lastname" type="text" class="input-text osc_input billing_input billing_required required" name="billing[lastname]">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                                            <label class="osc_label" for="osc_field_billing_cep">CEP<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_cep" onblur="OscAjax.preencherEndereco(this); " type="text" value="" class="input-text osc_input billing_input billing_required required" name="billing[postcode]" maxlength="9">

                            <a class="fieldpart-postcode-link osc_anchor" target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm">Não sabe o CEP?</a>
                        </div>
                    </div>
                </fieldset>
                <!--  ENDEREÇO  -->
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_address">Endereço<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_address" type="text" class="input-text  osc_input billing_input billing_required required" name="billing[street][0]">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_number">Número<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_number" type="number" class="input-text osc_input billing_input billing_required required" name="billing[street][1]">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_complement">Complemento</label>
                            <input id="osc_field_billing_complement" type="text" class="input-text  osc_input billing_input" name="billing[street][2]" maxlength="30">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_neighborhood">Bairro<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_neighborhood" type="text" class="input-text  osc_input billing_input billing_required required" name="billing[street][3]" maxlength="30">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_city">Cidade<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_city" type="text" class="input-text osc_input billing_input billing_required required" name="billing[city]" maxlength="30">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_region">Estado<em class="osc_required">*</em></label>
                            <select id="osc_field_billing_region" class="billing_select billing_input billing_required required" name="billing[region_id]">
                                <option value="">Selecione um estado...</option><option id="Acre" name="AC" value="485">Acre</option><option id="Alagoas" name="AL" value="486">Alagoas</option><option id="Amapá" name="AP" value="487">Amapá</option><option id="Amazonas" name="AM" value="488">Amazonas</option><option id="Bahia" name="BA" value="489">Bahia</option><option id="Ceará" name="CE" value="490">Ceará</option><option id="Espírito Santo" name="ES" value="491">Espírito Santo</option><option id="Goiás" name="GO" value="492">Goiás</option><option id="Maranhão" name="MA" value="493">Maranhão</option><option id="Mato Grosso" name="MT" value="494">Mato Grosso</option><option id="Mato Grosso do Sul" name="MS" value="495">Mato Grosso do Sul</option><option id="Minas Gerais" name="MG" value="496">Minas Gerais</option><option id="Pará" name="PA" value="497">Pará</option><option id="Paraíba" name="PB" value="498">Paraíba</option><option id="Paraná" name="PR" value="499">Paraná</option><option id="Pernambuco" name="PE" value="500">Pernambuco</option><option id="Piauí" name="PI" value="501">Piauí</option><option id="Rio de Janeiro" name="RJ" value="502">Rio de Janeiro</option><option id="Rio Grande do Norte" name="RN" value="503">Rio Grande do Norte</option><option id="Rio Grande do Sul" name="RS" value="504">Rio Grande do Sul</option><option id="Rondônia" name="RO" value="505">Rondônia</option><option id="Roraima" name="RR" value="506">Roraima</option><option id="Santa Catarina" name="SC" value="507">Santa Catarina</option><option id="São Paulo" name="SP" value="508">São Paulo</option><option id="Sergipe" name="SE" value="509">Sergipe</option><option id="Tocantins" name="TO" value="510">Tocantins</option><option id="Distrito Federal" name="DF" value="511">Distrito Federal</option>				</select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_cellphone">Telefone<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_telephone" max-length="14" type="tel" class="minTel input-text osc_input billing_input billing_required required" name="billing[telephone]" maxlength="14">
                        </div>
                    </div>
                </fieldset>

                                <fieldset class="form_billing_fs ">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_cellphone">Celular<em class="osc_required">*</em></label>
                            <input id="osc_field_billing_cellphone" max-length="15" type="tel" class="minCel input-text osc_input billing_input billing_cellphone billing_required required" name="billing[fax]" maxlength="15">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs">
                    <div class="field_row">
                        <div class="col-unique">
                            <label class="osc_label" for="osc_field_billing_reference">Ref. Entrega</label>
                            <input id="osc_field_billing_reference" type="text" class="input-text  osc_input billing_input " name="billing[reference]">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="field_pf mt10">
                    <div class="field_row">
                        <div class="col-unique">
                                <input id="osc_field_billing_useasshipping" onclick="OscTela.toggleFormularioEnvio();" checked="checked" type="checkbox" name="billing[use_for_shipping]"><label class="osc_label radio_label" for="osc_field_billing_useasshipping">Utilizar este endereço para envio</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form_billing_fs field_pf">
                    <div class="field_row">
                        <div class="col-unique">
                            <input id="osc_field_billing_saveaddress" type="checkbox" checked="true" name="billing[saveaddress]">
                            <label class="osc_label radio_label" for="osc_field_billing_saveaddress">Salvar Endereço</label>
                        </div>
                    </div>
                </fieldset>
                <input name="billing[country_id]" type="hidden" value="BR">
                <input name="billing[region]" id="osc_field_billing_region_name" type="hidden">
                <br>
                <div class="osc-validation">
                    <span><em class="osc_required">*</em> Campo Obrigatório</span>
                </div>
            </form>
        </div>
    </div>

    <div class="col3-middle">
        <div class="shipping-container">
            <div id="shipping_methods">
                <div class="osc-title">
                    <span class="number">3</span><h2 class="title">Métodos de Envio</h2>
                </div>
                <div id="ship-method">
                    <div id="co-shipping-method-form">
                        <div id="checkout-shipping-method-load">
                            <p>Informe o CEP para ver prazo e preço</p>
                            <ul id="shipping_error" class="error_osc_msg">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-container">
            <div id="div_payment_method_form">
                <div class="osc-title">
                    <span class="number">4</span><h2 class="title">Métodos de Pagamento</h2>
                </div>
                <div class="paymentmethod_div_header">
                    <div class="pay-method">
                        <div id="co-payment-form">
                            <fieldset>
                                <dl class="sp-methods" id="checkout-payment-method-load">
                                    <dt>
                                        <p>Informe um método de envio para selecionar um método de pagamento</p>
                                    </dt>
                                    <dt>
                                        <label for="p_method_mp_transparente" style="color: #b9b9b9;">Cartão de Crédito </label>
                                    </dt>
                                <dd>
                                <form class="formpaymentmethod form_payment_mp_transparente" method="POST">
                                    <p style="margin:0">
                                        <label for="p_method_mp_transparente"></label>
                                    </p>
                                    <ul class="form-list" id="payment_form_mp_transparente" style="display:none;">
                                        <input id="total" class="no-display" name="payment[total]" value="49.7400">
                                        <input type="text" class="no-display" id="mp_transparente_cc_qty_card" name="payment[qty_card]" value="">
                                        <li id="mp_identity_images"><img src="https://www.mercadopago.com/org-img/MLB/design/2015/m_pago/logos/mp_processado_01.png" alt="MercadoPago - Meios de pagamento" title="MercadoPago - Meios de pagamento"></li>
                                        <li>
                                            <ol class="form-card-one credit-card ">
                                            <li>
                                                <input type="hidden" id="token" class="cc-card-token-one" name="payment[credit_card][one][cc_token_id]">
                                                <input type="hidden" id="amount" class="cc-card-amount-one" name="payment[credit_card][one][amount]">
                                            </li>
                                            <li class="cc_count">Dados do Cartão</li>
                                            <li>
                                                <div class="input-box">
                                                    <label for="mp_transparente_cc_owner" class="required"><em>*</em>Nome no Cartão</label>
                                                    <input type="text" data-checkout="cardholderName" title="Nome no Cartão" class="input-text required cc_owner cc-owner-one" id="mp_transparente_cc_owner" name="payment[credit_card][one][cc_owner]" value="">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="input-box">
                                                    <label for="mp_transparente_cc_cpf" class="required"><em>*</em>CPF do Titular do Cartão</label>
                                                    <input title="CPF do Cartão" id="cc_cpf" name="payment[credit_card][one][doc_number]" data-checkout="docNumber" type="text" value="" class="input-text doc_number required cpf-one" maxlength="14">
                                                    <input data-checkout="docType" type="hidden" value="CPF">
                                                </div>
                                            </li>
                                            <li class="no-display">
                                                <label for="mp_transparente_cc_type" class="required"><em>*</em>Tipo de Cartão de Crédito</label>
                                                <div class="input-box">
                                                    <select id="issuersOptions" name="payment[credit_card][one][payment_method_id]" class="required validate-cc-type-select issuersOptions">
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <label for="mp_transparente_cc_number" class="required"><em>*</em>Número do Cartão de Crédito</label>
                                                <div class="input-box">
                                                    <input type="text" data-checkout="cardNumber" id="mp_transparente_cc_number_one" title="Número do Cartão de Crédito" class="one cc-number cc-number-one input-text validate-cc-number validate-cc-type required cc_number">
                                                </div>
                                            </li>
                                            <li id="mp_transparente_cc_type_exp_div">
                                                <label for="mp_transparente_expiration" class="required"><em>*</em>Data de Expiração</label>
                                                <div class="input-box">
                                                    <div class="v-fix">
                                                        <select id="mp_transparente_expiration" data-checkout="cardExpirationMonth" class="month validate-cc-exp required month-one" title="Data de Expiração">
                                                            <option value="" selected="selected">Mês</option>
                                                            <option value="1">01 - janeiro</option>
                                                            <option value="2">02 - fevereiro</option>
                                                            <option value="3">03 - março</option>
                                                            <option value="4">04 - abril</option>
                                                            <option value="5">05 - maio</option>
                                                            <option value="6">06 - junho</option>
                                                            <option value="7">07 - julho</option>
                                                            <option value="8">08 - agosto</option>
                                                            <option value="9">09 - setembro</option>
                                                            <option value="10">10 - outubro</option>
                                                            <option value="11">11 - novembro</option>
                                                            <option value="12">12 - dezembro</option>
                                                        </select>
                                                    </div>
                                                    <div class="v-fix">
                                                        <select data-checkout="cardExpirationYear" id="mp_transparente_expiration_yr" class="year year-one required" title="Ano de expiração">
                                                            <option value="" selected="selected">Ano</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <label>Parcelas:</label>
                                                <div class="input-box installments">
                                                    <select id="installmentsOption" name="payment[credit_card][one][cc_installments]" class="required installmentsOption installments-one">
                                                        <option value="">Digite o numero do cartão...</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li id="mp_transparente_cc_type_cvv_div">
                                                <label for="mp_transparente_cc_cid" class="required"><em>*</em>Número de Segurança</label>
                                                <div class="input-box">
                                                    <div class="v-fix">
                                                        <input type="text" data-checkout="securityCode" title="Número de Segurança" class="input-text cvv cc_cid validate-cc-cvn required cvv-one" id="mp_transparente_cc_cid">
                                                    </div>
                                                    <a href="#" class="cvv-what-is-this">O que é isso?<img id="cvv-mercadopago" class="no-display" src="https://www.cafeodebrecht.com.br/skin/frontend/base/default/images/cvv.gif">
                                                    </a>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ul>
                            </form>
                        </dd>
                        <dt>
                            <label for="p_method_pagarme_boleto" style="color: #b9b9b9;">Boleto Bancário - Pagar.me </label>
                        </dt>
                        <dt>
                            <label for="p_method_mp_boleto" style="color: #b9b9b9;">Boleto </label>
                        </dt>
                        <dt>
                            <label for="p_method_pagarme_cc" style="color: #b9b9b9;">Cartão de Crédito </label>
                        </dt>
                        <dd>
                            <form class="formpaymentmethod form_payment_pagarme_cc" method="POST">
                                <ul class="form-list form-pagarme" id="payment_form_pagarme_cc" style="display:none; padding: 7px 7px 0px 7px!important;">
                                    <input type="text" class="no-display" id="pagarme_cc_cc_qty_card" name="payment[qty_card]" value="1">
                                        <li class="form-card-one credit-card ">
                                            <ol>
                                                <li class="cc_count pagarme_main_color">Dados do Cartão  </li>
                                                <li>
                                                    <label for="pagarme_cc_cc_number_one" class="required"><em>*</em>Número do Cartão</label>
                                                    <div class="input-box">
                                                        <input type="text" id="pagarme_cc_cc_number_one" name="payment[credit_card][one][cc_number]" title="Número do Cartão" class="input-text pagarme-only-number required required-entry validate-pagarme-cc-number" onchange="pagarmeValidateFields('one')" maxlength="19" value="">
                                                    </div>
                                                </li>
                                                <li style="display: none;">
                                                    <input type="hidden" id="pagarme_cc_pagarme_card_hash_one" name="payment[credit_card][one][pagarme_card_hash]" value="">
                                                    <select id="pagarme_cc_cc_type_one" name="payment[credit_card][one][cc_type]" title="Tipo de Cartão" style="display: none;">
                                                        <option value="">Selecione...</option>
                                                        <option value="AE">American Express</option>
                                                        <option value="VI">Visa</option>
                                                        <option value="MC">MasterCard</option>
                                                        <option value="DI">Discover</option>
                                                        <option value="JCB">JCB</option>
                                                        <option value="EL">Elo</option>
                                                        <option value="DC">Diners Club</option>
                                                        <option value="AU">Aura</option>
                                                        <option value="HC">Hipercard</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <ol class="form-list pagarme-payment-icons" id="pagarme_cc_types_one">
                                                        <li class="AE">
                                                            <span>American Express</span>
                                                        </li>
                                                                            <li class="VI">
                                                            <span>Visa</span>
                                                        </li>
                                                                            <li class="MC">
                                                            <span>MasterCard</span>
                                                        </li>
                                                                            <li class="DI">
                                                            <span>Discover</span>
                                                        </li>
                                                                            <li class="JCB">
                                                            <span>JCB</span>
                                                        </li>
                                                                            <li class="EL">
                                                            <span>Elo</span>
                                                        </li>
                                                                            <li class="DC">
                                                            <span>Diners Club</span>
                                                        </li>
                                                                            <li class="AU">
                                                            <span>Aura</span>
                                                        </li>
                                                                            <li class="HC">
                                                            <span>Hipercard</span>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li>
                                                    <label for="pagarme_cc_expiration_one" class="required"><em>*</em>Data de Validade</label>
                                                    <div class="input-box">
                                                        <div class="v-fix pagarme-cc-expiration">
                                                            <select id="pagarme_cc_expiration_one" name="payment[credit_card][one][cc_expiration_month]" class="required month validate-pagarme-cc-exp validate-select" onchange="pagarmeValidateFields('one')">
                                                                <option value="">Mês</option>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                                <option value="5">05</option>
                                                                <option value="6">06</option>
                                                                <option value="7">07</option>
                                                                <option value="8">08</option>
                                                                <option value="9">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                            <span>/</span>
                                                            <select id="pagarme_cc_expiration_yr_one" name="payment[credit_card][one][cc_expiration_year]" class="required year validate-select" onchange="pagarmeValidateFields('one')">
                                                                <option value="">Ano</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="pagarme_cc_cc_owner_one" class="required"><em>*</em>Nome no Cartão</label>
                                                    <div class="input-box">
                                                        <input type="text" title="Nome no Cartão" class="input-text required required-entry cc_owner" id="pagarme_cc_cc_owner_one" name="payment[credit_card][one][cc_owner]" onchange="pagarmeValidateFields('one')" value="">
                                                        <div class="pagarme-card-name-tool-tip">
                                                            <img src="https://www.cafeodebrecht.com.br/skin/frontend/base/default/pagarme/images/icon_card_name.png" class="pagarme-cvv-icon">
                                                            <div class="pagarme-cvv-image">
                                                                <img src="https://www.cafeodebrecht.com.br/skin/frontend/base/default/pagarme/images/card_name.png" alt="Referência visual para o nome do dono do cartão" title="Referência visual para o nome do dono do cartão">
                                                            </div>
                                                            <span class="pagarme-card-name-tool-tip-arrow">&nbsp;</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="pagarme_cc_cc_cid_one" class="required"><em>*</em>Número de Segurança</label>
                                                    <div class="input-box">
                                                        <div class="v-fix pagarme-cvv">
                                                            <input type="text" title="Número de Segurança" class="input-text pagarme-only-number cvv required required-entry validate-pagarme-cc-cvn" id="pagarme_cc_cc_cid_one" name="payment[credit_card][one][cc_cvv]" maxlength="4" onchange="pagarmeValidateFields('one')" value="">
                                                        </div>
                                                        <div class="pagarme-cvv-tool-tip">
                                                            <img src="https://www.cafeodebrecht.com.br/skin/frontend/base/default/pagarme/images/icon_cvv.gif" class="pagarme-cvv-icon">
                                                            <div class="pagarme-cvv-image">
                                                                <img src="https://www.cafeodebrecht.com.br/skin/frontend/base/default/pagarme/images/cvv.gif" alt="Referência visual para verificação de número de cartão" title="Referência visual para verificação de número de cartão">
                                                            </div>
                                                            <span class="pagarme-cvv-tool-tip-arrow">&nbsp;</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="pagarme_cc_installments" class="required"><em>*</em>Parcelas</label>
                                                    <div class="input-box">
                                                        <select id="pagarme_cc_installments_one" name="payment[credit_card][one][installments]" title="Parcelas" class="required required-entry validate-select">
                                                            <option value="">Selecione...</option>
                                                            <option value="1">Á vista - R$ 49,74</option>
                                                            <option value="2">2x de R$ 24,87 sem juros</option>
                                                        </select>
                                                        <input type="hidden" id="pagarme_cc_installment_description_one" name="payment[credit_card][one][installment_description]" value="">
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li style="display:none;">
                                            <label id="pagarme-cardhash-waiting" class="a-center" style="display:none;">Um momento ...</label>
                                            <label id="pagarme-cardhash-success" class="a-center" style="display:none;">Tudo certo!</label>
                                        </li>
                                        <li class="pagarme_alert">
                                            <span>
                                            </span>
                                        </li>
                                    </ul>
                                </form>
                            </dd>
                        </dl>
                        <ul id="payment_error" class="error_osc_msg">
                        </ul>
                        </fieldset>
                        </div>        </div>
                            </div>
                        </div>	</div>

                </div>
                <div class="col3-right">
                    <div class="border">
                        <div class="review-container">
                            <div class="osc-title">
                                <span class="number">5</span><h2 class="title">Revisão do Pedido</h2>
                            </div>
                            <br>
                            <div id="checkout-review-load">
                                <div id="checkout-review-table-wrapper">
                                     <table class="data-table" id="checkout-review-table">
                                        <thead>
                                            <tr class="headers-osc">
                                                <th rowspan="1">Produto</th>
                                                <th colspan="1" class="a-center">Preço</th>
                                                <th rowspan="1" class="a-center">Qtd.</th>
                                                <th colspan="1" class="a-center">Subtotal</th>
                                            </tr>
                                        </thead>
                                    <tfoot>
                                        <tr>
                                            <td style="" class="a-right" colspan="3">
                                                Subtotal
                                            </td>
                                            <td style="" class="a-right">
                                                <span class="price">R$ 49,74</span>
                                            </td>
                                        </tr>
                                            <tr>
                                            <td style="" class="a-right" colspan="3">
                                                <strong>Valor Total</strong>
                                            </td>
                                            <td style="" class="a-right">
                                                <strong><span class="price">R$ 49,74</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <tbody>
                                    <tr class="bodies-osc">
                                        <td>
                                            <div class="img-wrapper">
                                                <img class="img-product" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/80x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001937_12_1_1200_72_rgb.png" width="50">
                                                <div class="hover-img"> <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/180x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001937_12_1_1200_72_rgb.png"> </div>
                                            </div>
                                            <h3 class="product-name">Café Odebrecht Tradicional 500g</h3>
                                        </td>
                                        <td class="a-right">
                                            <span class="cart-price">
                                                <span class="price">R$ 6,99</span>
                                            </span>
                                        </td>
                                        <td class="a-center">1</td>
                                            <td class="a-right">
                                                <span class="cart-price">
                                                        <span class="price">R$ 6,99</span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="bodies-osc">
                                            <td>
                                                <div class="img-wrapper">
                                                    <img class="img-product" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/80x/9df78eab33525d08d6e5fb8d27136e95/s/i/site_superior_250.jpg" width="50">
                                                <div class="hover-img">
                                                    <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/180x/9df78eab33525d08d6e5fb8d27136e95/s/i/site_superior_250.jpg"> </div>
                                                </div>
                                                <h3 class="product-name">Café Odebrecht Superior 250g</h3>
                                            </td>
                                            <td class="a-right">
                                                <span class="cart-price">
                                                    <span class="price">R$ 4,75</span>
                                                </span>
                                            </td>
                                            <td class="a-center">9</td>
                                            <td class="a-right">
                                                <span class="cart-price">
                                                    <span class="price">R$ 42,75</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mobile-table-hand"></div>
                            </div>
                            <div id="checkout-review-options">
                            </div>
                        </div>
                        <div class="alert-container">
                            <div class="alert">Alerta</div>
                        </div>
                        <div class="back-to-cart">
                            <a title="Voltar para o carrinho" href="https://www.cafeodebrecht.com.br/checkout/cart">Esqueceu de algum item?</a>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="img-wrapper">
                            <img src="https://www.cafeodebrecht.com.br/skin/frontend/cafe/2018/images/selos/selo-seguranca.png" alt="Site Seguro Criptogradia SSL de 256 bits" title="Site Seguro Criptogradia SSL de 256 bits" class="seloSeguro">
                        </div>
                        <div class="btn-wrapper">
                            <button onclick="OscGeral.initSalvarPedido();" class=" btn-checkout">Finalizar compra</button>
                        </div>
                    </div>
                </div>
                <a id="mostrarscreenlocker" href="#screenlocker"></a>
            </div>
            <!-- end third column-->
            <div style="display:none"><div id="screenlocker" style="height : 400px;">
                <img src="https://www.cafeodebrecht.com.br/skin/frontend/cafe/2018/images/osc/logoloader.png">
                <br>
                <img src="https://www.cafeodebrecht.com.br/skin/frontend/cafe/2018/images/osc/loader.gif">
            </div>
        </div>
        <div id="loading-overlay"></div>
    </div>
</div>
@endsection


@section('javascript-scripts')

@endsection
