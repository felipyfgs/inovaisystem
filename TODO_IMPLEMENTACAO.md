# TODO de Implementação - InovAI System

Controle histórico para acompanhar decisões, fases, implementação, validações e pendências do projeto.

## Legenda de status

- `[ ]` Pendente
- `[~]` Em análise / exploração
- `[>]` Pronto para implementar
- `[x]` Concluído
- `[!]` Bloqueado / risco
- `[?]` Precisa decisão

## 0. Histórico de decisões

| Data | Decisão | Contexto | Status |
|---|---|---|---|
| 2026-05-12 | Backend em Laravel 13 | Projeto criado em `backend/` | `[x]` |
| 2026-05-12 | Frontend separado em Nuxt 4 | Template `nuxt-ui-templates/dashboard`; não embutir no Laravel | `[x]` |
| 2026-05-12 | Banco alvo será PostgreSQL | Migração a partir de sistema legado MySQL/Laravel 8 | `[x]` |
| 2026-05-12 | Usar OpenSpec antes de implementar | Primeiro mapear tudo, depois criar proposal/design/specs | `[x]` |
| 2026-05-12 | Escopo será recriar o sistema inspirado no legado | Legado será referência de domínio, não base para copiar código ou importar tudo agora | `[x]` |
| 2026-05-12 | Implementação por fases de domínio | Evitar big bang; mapear tudo, mas entregar incrementalmente | `[x]` |
| 2026-05-12 | Frontend será Nuxt ERP novo | Usar template dashboard como base visual; não copiar telas Blade/Dashmin | `[x]` |
| 2026-05-12 | Fiscal será modelado cedo e implementado depois | Banco/arquitetura consideram fiscal completo; emissão/SEFAZ entra em fase própria | `[x]` |
| 2026-05-12 | Módulos avançados serão mapeados agora e faseados depois | CRM, Essentials/RH, Manufacturing, Repair, Superadmin e WooCommerce não travam o core | `[x]` |
| 2026-05-12 | Auth via plugin Nuxt Sanctum | Usar `nuxt-auth-sanctum` com Sanctum SPA cookies + CSRF | `[x]` |
| 2026-05-12 | Permissões com Spatie + `business_id` | Preservar modelo mental do legado com RBAC e isolamento por empresa | `[x]` |
| 2026-05-12 | API REST JSON | Usar Resources, Form Requests, Policies, filtros e paginação server-side | `[x]` |
| 2026-05-12 | Dados iniciais via seeders mínimos | Não importar banco legado agora; usar legado como inspiração/análise | `[x]` |

## 1. Mapeamento e descoberta

### 1.1 Template Nuxt Dashboard

- `[x]` Baixar/estudar `nuxt-ui-templates/dashboard`
- `[x]` Confirmar stack: Nuxt 4, Nuxt UI v4, TypeScript, Tailwind 4
- `[x]` Confirmar que Nuxt UI v4 é gratuito/open-source
- `[x]` Mapear páginas, layout, componentes e APIs mock
- `[ ]` Mapear componentes Nuxt que serão reaproveitados no ERP

### 1.2 Backend Laravel 13 atual

- `[x]` Criar projeto Laravel 13 em `backend/`
- `[x]` Verificar versão: Laravel 13.8.0
- `[x]` Identificar ausência de `routes/api.php`
- `[x]` Identificar bloqueio SQLite: extensão `pdo_sqlite` ausente
- `[ ]` Decidir se backend manterá arquivos Blade/Vite padrão ou será API-only

### 1.3 Sistema legado base

Base: `.factory/stude/sistema`

- `[x]` Mapear stack principal: Laravel 8, MySQL, Blade, jQuery/Admin template
- `[x]` Mapear composer/packages principais
- `[x]` Mapear escala inicial: models, migrations, controllers, routes, views
- `[x]` Mapear módulos: Crm, Essentials, Manufacturing, Repair, ProductCatalogue, Superadmin, Woocommerce
- `[ ]` Mapear todas as tabelas por domínio
- `[ ]` Mapear todos os models e relacionamentos críticos
- `[ ]` Mapear todos os controllers por responsabilidade
- `[ ]` Mapear rotas web completas
- `[ ]` Mapear rotas API/e-commerce completas
- `[ ]` Mapear telas Blade e equivalentes futuros no Nuxt
- `[ ]` Mapear permissões, roles e guards
- `[ ]` Mapear integrações fiscais e pagamentos
- `[ ]` Mapear jobs, events, notifications e services

## 2. Arquitetura alvo

### 2.1 Estrutura geral

- `[>]` Backend: Laravel 13 API em `backend/`
- `[>]` Frontend: Nuxt 4 em `frontend/`
- `[>]` Banco: PostgreSQL
- `[>]` Auth: Laravel Sanctum SPA cookies com `nuxt-auth-sanctum`
- `[>]` UI: Nuxt UI v4 dashboard
- `[>]` API: REST JSON com Resources, Form Requests, Policies e paginação/filtros server-side
- `[>]` Permissões: Spatie Permission + isolamento por `business_id`
- `[>]` Tenancy: `business_id` como estratégia inicial
- `[?]` Deploy: Docker local primeiro ou infra final desde o início?

### 2.2 Decisões alinhadas

- `[x]` Escopo: recriar tudo inspirado no legado, com implementação faseada por domínio
- `[x]` Dados: sem importação inicial; seeders mínimos e legado como referência
- `[x]` Fiscal: modelar cedo na arquitetura/banco; emissão entra em fase própria
- `[x]` Multitenancy: manter `business_id`
- `[x]` Frontend: Nuxt ERP novo, sem copiar Blade/Dashmin
- `[x]` Módulos: mapear todos agora, implementar por fases posteriores

### 2.3 Decisões ainda pendentes

- `[?]` Deploy: Docker local primeiro ou infra final desde o início?
- `[?]` Manter nomes legados em inglês/português ou padronizar?
- `[?]` Ordem exata das fases após o core ERP/fiscal

## 3. OpenSpec

### 3.1 Preparação

- `[x]` Verificar contexto OpenSpec: sem changes ativos
- `[ ]` Atualizar `openspec/config.yaml` com contexto do projeto
- `[ ]` Criar glossário/domínios para orientar proposals

### 3.2 Proposal

- `[ ]` Criar proposal principal da migração
- `[ ]` Definir objetivos e não-objetivos
- `[x]` Definir escopo macro: reescrita total inspirada no legado
- `[x]` Definir estratégia: fases por domínio
- `[ ]` Definir recorte da primeira fase implementável
- `[ ]` Definir riscos principais
- `[ ]` Definir estratégia de migração incremental por domínio

### 3.3 Design

- `[ ]` Criar design da arquitetura backend/frontend
- `[ ]` Definir fronteiras de domínio
- `[x]` Definir padrão de API: REST JSON
- `[x]` Definir autenticação: Sanctum SPA + `nuxt-auth-sanctum`
- `[x]` Definir autorização: Spatie Permission + `business_id`
- `[x]` Definir estratégia de multitenancy: `business_id`
- `[ ]` Definir estratégia de migrations Postgres

### 3.4 Specs por capacidade

- `[ ]` Spec: autenticação
- `[ ]` Spec: tenants/empresas
- `[ ]` Spec: usuários e permissões
- `[ ]` Spec: contatos/clientes/fornecedores
- `[ ]` Spec: produtos/categorias/marcas/unidades
- `[ ]` Spec: estoque
- `[ ]` Spec: vendas/POS
- `[ ]` Spec: financeiro básico
- `[ ]` Spec: fiscal brasileiro
- `[ ]` Spec: e-commerce
- `[ ]` Spec: CRM
- `[ ]` Spec: restaurante
- `[ ]` Spec: configurações operacionais
- `[ ]` Spec: importação/exportação
- `[ ]` Spec: documentos, arquivos e mídia
- `[ ]` Spec: notificações e comunicação
- `[ ]` Spec: pagamentos e gateways
- `[ ]` Spec: auditoria
- `[ ]` Spec: instalação, atualização e manutenção
- `[ ]` Spec: relatórios

## 4. Infraestrutura base

### 4.1 Docker e serviços

- `[ ]` Criar `docker-compose.yml`
- `[ ]` Serviço PostgreSQL
- `[ ]` Serviço backend Laravel
- `[ ]` Serviço frontend Nuxt
- `[ ]` Serviço Redis, se necessário
- `[ ]` Definir volumes persistentes
- `[ ]` Definir rede interna entre serviços

### 4.2 Backend Laravel

- `[ ]` Configurar `.env` para PostgreSQL
- `[ ]` Instalar/configurar Sanctum
- `[ ]` Criar `routes/api.php`
- `[ ]` Configurar CORS para Nuxt
- `[ ]` Configurar session/cookies para SPA
- `[ ]` Configurar Pint/testes
- `[ ]` Configurar padrões de API Resource/Form Request

### 4.3 Frontend Nuxt

- `[ ]` Criar projeto em `frontend/`
- `[ ]` Instalar template dashboard
- `[ ]` Configurar `runtimeConfig.public.apiBase`
- `[ ]` Instalar/configurar `nuxt-auth-sanctum`
- `[ ]` Criar composable/API client
- `[ ]` Ajustar layout/sidebar para ERP
- `[ ]` Definir padrão de páginas, tabelas e formulários

## 5. Domínios core

### 5.1 Business / Empresas

- `[ ]` Migrar conceito de `business`
- `[ ]` Migrar configurações fiscais básicas da empresa
- `[ ]` Migrar locations/unidades (`business_locations`)
- `[ ]` Definir troca de empresa/location no frontend
- `[ ]` Definir políticas de acesso por empresa/localização

### 5.2 Usuários, roles e permissões

- `[ ]` Instalar/configurar Spatie Permission
- `[ ]` Migrar permissões base
- `[ ]` Criar CRUD de usuários
- `[ ]` Criar CRUD de roles
- `[ ]` Criar controle de permissões por localização
- `[ ]` Integrar menus do Nuxt com permissões

### 5.3 Contatos

- `[ ]` Migrar `contacts`
- `[ ]` Separar cliente, fornecedor e ambos
- `[ ]` Modelar dados fiscais: CPF/CNPJ, IE/RG, contribuinte, consumidor final
- `[ ]` Modelar endereço principal e entrega
- `[ ]` Criar listagem, filtros, criação, edição e exclusão

### 5.4 Produtos e catálogo

- `[ ]` Migrar `products`
- `[ ]` Migrar categorias, marcas e unidades
- `[ ]` Migrar variações e grupos de variação
- `[ ]` Migrar preço de venda e custo
- `[ ]` Migrar campos fiscais: NCM, CEST, CFOP, CST/CSOSN, PIS/COFINS/IPI
- `[ ]` Migrar campos e-commerce: destaque, novo, medidas, valor e-commerce
- `[ ]` Criar listagem e CRUD no Nuxt

### 5.5 Estoque

- `[ ]` Migrar estoque por localização
- `[ ]` Migrar purchase lines como origem de estoque
- `[ ]` Migrar ajustes de estoque
- `[ ]` Migrar transferência de estoque
- `[ ]` Definir relatório de estoque

### 5.6 Vendas / POS

- `[ ]` Migrar `transactions` para vendas
- `[ ]` Migrar `transaction_sell_lines`
- `[ ]` Migrar pagamentos (`transaction_payments`)
- `[ ]` Criar fluxo de venda simples
- `[ ]` Criar tela POS no Nuxt
- `[ ]` Criar fechamento/abertura de caixa
- `[ ]` Criar devolução de venda

### 5.7 Compras

- `[ ]` Migrar fluxo de compras
- `[ ]` Migrar purchase lines
- `[ ]` Migrar status de compra
- `[ ]` Migrar pagamentos de compra
- `[ ]` Criar telas no Nuxt

### 5.8 Financeiro

- `[ ]` Migrar contas financeiras
- `[ ]` Migrar transações financeiras
- `[ ]` Migrar bancos
- `[ ]` Migrar despesas
- `[ ]` Migrar receitas
- `[ ]` Criar relatórios básicos

### 5.9 Cadastros auxiliares

- `[ ]` Migrar grupos de clientes (`customer_groups`)
- `[ ]` Migrar descontos (`discounts`)
- `[ ]` Migrar garantias (`warranties`)
- `[ ]` Migrar tipos de serviço (`types_of_services`)
- `[ ]` Migrar vendedores/agentes de comissão (`sales_commission_agents`)
- `[ ]` Migrar taxonomias (`taxonomies`)
- `[ ]` Migrar grupos de preço de venda (`selling_price_groups`)
- `[ ]` Migrar grupos de taxas (`group_sub_taxes`)
- `[ ]` Migrar cidades, países e dados auxiliares fiscais

### 5.10 Configurações operacionais

- `[ ]` Migrar layouts de nota/fatura (`invoice_layouts`)
- `[ ]` Migrar esquemas de numeração (`invoice_schemes`)
- `[ ]` Migrar impressoras (`printers`)
- `[ ]` Migrar etiquetas/códigos de barras (`barcodes`, labels)
- `[ ]` Migrar modelos/templates de notificação (`notification_templates`)
- `[ ]` Migrar configurador de dashboard (`dashboard_configurations`)
- `[ ]` Migrar configurações por localização (`location_settings`)
- `[ ]` Migrar configurações de teclado/atalhos e POS
- `[ ]` Migrar preferências de data, hora, moeda e idioma

## 6. Domínios fiscais brasileiros

### 6.1 Base fiscal

- `[ ]` Mapear dependências `nfephp-org/sped-*`
- `[ ]` Migrar certificado digital e configurações por empresa
- `[ ]` Migrar naturezas de operação
- `[ ]` Migrar IBPT
- `[ ]` Migrar percentuais por estado
- `[ ]` Definir armazenamento seguro do certificado

### 6.2 NF-e

- `[ ]` Mapear `NfeController` e services relacionados
- `[ ]` Migrar emissão/autorização
- `[ ]` Migrar cancelamento
- `[ ]` Migrar carta de correção
- `[ ]` Migrar DANFE
- `[ ]` Migrar inutilização

### 6.3 NFC-e

- `[ ]` Mapear `NfceController`
- `[ ]` Migrar emissão/autorização
- `[ ]` Migrar contingência
- `[ ]` Migrar impressão

### 6.4 CT-e / MDF-e

- `[ ]` Mapear CT-e
- `[ ]` Mapear MDF-e
- `[ ]` Migrar veículos, transportadoras, percursos e carregamentos
- `[ ]` Migrar emissão, encerramento e cancelamento

### 6.5 Boletos / Remessas

- `[ ]` Mapear `laravel-boleto`
- `[ ]` Migrar boletos
- `[ ]` Migrar remessas
- `[ ]` Migrar bancos e carteiras

### 6.6 Arquivos fiscais e armazenamento

- `[ ]` Mapear diretórios `public/xml_nfe`, `xml_nfce`, `xml_cte`, `xml_mdfe`
- `[ ]` Mapear XMLs cancelados e cartas de correção
- `[ ]` Mapear `print_xml`
- `[ ]` Definir política de retenção de XML fiscal
- `[ ]` Definir armazenamento seguro para certificados em `public/certificados`
- `[ ]` Definir backup/restore de documentos fiscais

### 6.7 Integrações SEFAZ e serviços fiscais

- `[ ]` Mapear `NFeService`
- `[ ]` Mapear `NFCeService` e `NFCeService1`
- `[ ]` Mapear `NFeEntradaService`
- `[ ]` Mapear `CTeService`
- `[ ]` Mapear `MDFeService`
- `[ ]` Mapear `DFeService`
- `[ ]` Mapear `DevolucaoService`
- `[ ]` Mapear `EnviarXmlController`

## 7. Módulos adicionais

### 7.1 E-commerce próprio

- `[ ]` Mapear clientes e-commerce
- `[ ]` Mapear carrinho/pedido
- `[ ]` Mapear cupons
- `[ ]` Mapear cálculo de frete
- `[ ]` Mapear pagamento PIX/cartão/boleto
- `[ ]` Definir se será portal separado ou parte do Nuxt dashboard

### 7.2 WooCommerce

- `[ ]` Migrar configurações API
- `[ ]` Migrar sync de categorias
- `[ ]` Migrar sync de produtos
- `[ ]` Migrar sync de pedidos
- `[ ]` Migrar webhooks
- `[ ]` Migrar logs

### 7.3 CRM

- `[ ]` Migrar leads
- `[ ]` Migrar campanhas
- `[ ]` Migrar follow-ups/agendamentos
- `[ ]` Migrar propostas
- `[ ]` Migrar logs de chamadas
- `[ ]` Migrar portal de contato, se necessário

### 7.4 Essentials / RH

- `[ ]` Migrar documentos
- `[ ]` Migrar tarefas
- `[ ]` Migrar mensagens
- `[ ]` Migrar lembretes
- `[ ]` Migrar presença/attendance
- `[ ]` Migrar férias/licenças
- `[ ]` Migrar turnos
- `[ ]` Migrar folha/pagamentos
- `[ ]` Migrar base de conhecimento

### 7.5 Manufacturing

- `[ ]` Migrar receitas de produção
- `[ ]` Migrar ingredientes
- `[ ]` Migrar grupos de ingredientes
- `[ ]` Migrar produção e consumo de estoque

### 7.6 Repair

- `[ ]` Migrar modelos de dispositivo
- `[ ]` Migrar status de reparo
- `[ ]` Migrar fichas de serviço
- `[ ]` Migrar checklist e peças

### 7.7 Superadmin / SaaS

- `[ ]` Migrar pacotes
- `[ ]` Migrar assinaturas
- `[ ]` Migrar permissões por pacote
- `[ ]` Migrar tela de administração global
- `[ ]` Migrar comunicador

### 7.8 Restaurante

- `[ ]` Migrar mesas (`res_tables`)
- `[ ]` Migrar reservas/bookings
- `[ ]` Migrar cozinha/KDS
- `[ ]` Migrar pedidos de restaurante
- `[ ]` Migrar modificadores (`modifiers`)
- `[ ]` Migrar conjuntos de modificadores por produto
- `[ ]` Migrar fluxo de impressão/cozinha
- `[ ]` Definir telas Nuxt para salão, cozinha e pedidos

### 7.9 Product Catalogue

- `[ ]` Mapear módulo `ProductCatalogue`
- `[ ]` Migrar catálogo público/QR code se necessário
- `[ ]` Definir se catálogo será portal separado ou página pública Nuxt

## 8. Frontend Nuxt por área

### 8.1 Shell do sistema

- `[ ]` Sidebar principal do ERP
- `[ ]` Topbar com empresa/localização
- `[ ]` Command palette
- `[ ]` Tema claro/escuro
- `[ ]` Menu baseado em permissões

### 8.2 Telas core

- `[ ]` Dashboard
- `[ ]` Empresas
- `[ ]` Localizações
- `[ ]` Usuários
- `[ ]` Roles/permissões
- `[ ]` Contatos
- `[ ]` Produtos
- `[ ]` Estoque
- `[ ]` Compras
- `[ ]` Vendas
- `[ ]` POS
- `[ ]` Financeiro
- `[ ]` Relatórios
- `[ ]` Configurações operacionais
- `[ ]` Importações/exportações
- `[ ]` Documentos e mídia
- `[ ]` Notificações
- `[ ]` Auditoria/activity log
- `[ ]` Backups/updates/manutenção

### 8.3 Componentes reutilizáveis

- `[ ]` Data table com filtros e paginação server-side
- `[ ]` Form drawer/modal
- `[ ]` Confirmação de exclusão
- `[ ]` Select de empresa/localização
- `[ ]` Select de produto/variação
- `[ ]` Select de cliente/fornecedor
- `[ ]` Inputs monetários e percentuais
- `[ ]` Inputs fiscais: CPF/CNPJ, IE, CEP, NCM, CFOP
- `[ ]` Upload de arquivos/documentos
- `[ ]` Visualizador/download de XML/PDF
- `[ ]` Wizard/stepper para emissão fiscal
- `[ ]` Componentes de impressão/etiquetas
- `[ ]` Componentes de importação CSV/Excel/XML
- `[ ]` Componentes de seleção de forma de pagamento

## 8.4 Localização e i18n

- `[ ]` Mapear traduções existentes em `resources/lang`
- `[ ]` Definir idioma padrão do novo sistema
- `[ ]` Migrar mensagens PT-BR relevantes
- `[ ]` Definir formatos de moeda, data, hora e timezone
- `[ ]` Definir estratégia para multi-idioma no Nuxt

## 8.5 API pública e portal externo

- `[ ]` Mapear endpoints `app/Http/Controllers/Api`
- `[ ]` Mapear middleware `authEcommerce`
- `[ ]` Definir autenticação do cliente e-commerce
- `[ ]` Definir API pública para catálogo, carrinho e pedidos
- `[ ]` Definir versionamento da API

## 9. Migração de dados

### 9.1 Estratégia

- `[x]` Confirmado: não haverá importação inicial do banco legado
- `[x]` Usar sistema legado como referência/análise para modelagem do novo banco
- `[>]` Criar seeders mínimos para validar fluxos no PostgreSQL
- `[ ]` Criar mapeamento conceitual MySQL legado → PostgreSQL novo
- `[ ]` Definir transformação de enums
- `[ ]` Definir tratamento de campos fiscais sensíveis
- `[ ]` Definir estratégia para arquivos/media/certificados

### 9.2 Ordem sugerida de importação

- `[ ]` System/configs
- `[ ]` Currencies/cities/base tables
- `[ ]` Users
- `[ ]` Business
- `[ ]` Business locations
- `[ ]` Roles/permissions
- `[ ]` Contacts
- `[ ]` Categories/brands/units
- `[ ]` Products/variations
- `[ ]` Stock
- `[ ]` Transactions
- `[ ]` Payments
- `[ ]` Fiscal documents

## 9.3 Seeders mínimos

- `[ ]` Criar seed de moeda padrão
- `[ ]` Criar seed de cidades/dados auxiliares mínimos
- `[ ]` Criar seed de permissões base
- `[ ]` Criar seed de empresa demo
- `[ ]` Criar seed de localização demo
- `[ ]` Criar seed de usuário admin
- `[ ]` Criar seed de cliente/fornecedor demo
- `[ ]` Criar seed de categorias, marcas e unidades demo
- `[ ]` Criar seed de produtos demo
- `[ ]` Criar seed de venda/POS demo

## 9.4 Arquivos, mídia e documentos

- `[ ]` Mapear `public/uploads`
- `[ ]` Mapear `public/files`
- `[ ]` Mapear `public/boletos`
- `[ ]` Mapear `public/remessas`
- `[ ]` Mapear imagens de produtos e mídias
- `[ ]` Definir storage local/S3 compatível
- `[ ]` Definir permissões de acesso a arquivos por `business_id`

## 9.5 Importação/exportação

- `[ ]` Mapear importação de produtos
- `[ ]` Mapear importação de vendas
- `[ ]` Mapear importação de estoque inicial
- `[ ]` Mapear importação de XML
- `[ ]` Mapear importação de purchase XML
- `[ ]` Mapear export/import de grupos de preço
- `[ ]` Definir suporte a CSV/Excel via alternativa ao `maatwebsite/excel`
- `[ ]` Definir validações e relatórios de erro de importação

## 9.6 Auditoria e logs

- `[ ]` Mapear `spatie/laravel-activitylog`
- `[ ]` Definir eventos auditáveis por domínio
- `[ ]` Definir visualização de activity log no Nuxt
- `[ ]` Mapear eventos de pagamento: criado, atualizado, removido
- `[ ]` Definir trilha de auditoria para emissão fiscal
- `[ ]` Definir logs de integrações externas

## 9.7 Notificações e comunicação

- `[ ]` Mapear notificações core: cliente, fornecedor, recorrência e teste de e-mail
- `[ ]` Mapear notificações dos módulos
- `[ ]` Mapear templates de e-mail/SMS
- `[ ]` Definir canais: e-mail, SMS, database, broadcast
- `[ ]` Definir uso ou remoção de Pusher
- `[ ]` Definir fila/queue para notificações

## 9.8 Pagamentos e gateways

- `[ ]` Mapear MercadoPago
- `[ ]` Mapear Stripe
- `[ ]` Mapear PayPal
- `[ ]` Mapear Razorpay
- `[ ]` Mapear PesaPal
- `[ ]` Mapear PIX
- `[ ]` Mapear cartão
- `[ ]` Mapear boleto
- `[ ]` Mapear pagamentos offline
- `[ ]` Definir abstração de gateway no novo backend

## 9.9 Instalação, atualização e manutenção

- `[ ]` Mapear instalador (`InstallController`)
- `[ ]` Mapear gerenciador de módulos (`ModulesController`)
- `[ ]` Mapar `system_updates`
- `[ ]` Mapear backups (`spatie/laravel-backup`)
- `[ ]` Mapear update controller
- `[ ]` Definir estratégia de migrations e updates em produção
- `[ ]` Definir painel de saúde/manutenção

## 10. Validação e qualidade

### 10.1 Backend

- `[ ]` Pint
- `[ ]` Testes unitários
- `[ ]` Testes feature/API
- `[ ]` Policies e autorização
- `[ ]` Validação de tenancy em todos endpoints
- `[ ]` Testes de migração

### 10.2 Frontend

- `[ ]` ESLint
- `[ ]` Typecheck
- `[ ]` Testes de páginas críticas
- `[ ]` Validação responsiva
- `[ ]` Validação de acessibilidade básica

### 10.3 Integração

- `[ ]` Fluxo login/logout
- `[ ]` Fluxo CRUD completo
- `[ ]` Fluxo venda/POS
- `[ ]` Fluxo pagamento
- `[ ]` Fluxo fiscal, quando habilitado
- `[ ]` Fluxo restaurante, quando habilitado
- `[ ]` Fluxo importação/exportação
- `[ ]` Fluxo notificações
- `[ ]` Fluxo backup/restore

### 10.4 Segurança

- `[ ]` Validar isolamento por `business_id`
- `[ ]` Validar policies por domínio
- `[ ]` Validar proteção de certificados digitais
- `[ ]` Validar proteção de XMLs, PDFs, boletos e remessas
- `[ ]` Validar CORS/cookies/Sanctum em ambiente local e produção
- `[ ]` Validar rate limit para API pública/e-commerce
- `[ ]` Validar permissões de storage

## 11. Registro de implementação

Use esta seção para registrar o histórico real conforme as fases forem executadas.

### 2026-05-12

- `[x]` Criado backend Laravel 13 em `backend/`
- `[x]` Analisado template Nuxt dashboard
- `[x]` Iniciado mapeamento do sistema legado em `.factory/stude/sistema`
- `[x]` Definido PostgreSQL como banco alvo
- `[x]` Criado este controle histórico de implementação
- `[x]` Decidido recriar o sistema inspirado no legado, com implementação por fases de domínio
- `[x]` Decidido frontend Nuxt ERP novo baseado no template dashboard
- `[x]` Decidido modelar fiscal cedo e implementar emissão fiscal depois
- `[x]` Decidido mapear todos os módulos agora e implementar módulos avançados em fases posteriores
- `[x]` Decidido usar `nuxt-auth-sanctum`, Spatie Permission + `business_id`, REST JSON e seeders mínimos

## 12. Riscos conhecidos

- `[!]` Reescrita total pode ficar grande demais se todos os módulos entrarem no MVP
- `[!]` Domínio fiscal brasileiro é crítico e de alto risco regulatório
- `[!]` Migração MySQL → PostgreSQL pode exigir ajustes em migrations, enums, índices e queries
- `[!]` Controllers legados concentram muita regra de negócio e precisam ser desmontados com cuidado
- `[!]` Multitenancy por `business_id` precisa ser aplicado de forma consistente para evitar vazamento de dados
- `[!]` Certificados digitais e dados fiscais exigem armazenamento seguro
- `[!]` Arquivos públicos legados incluem XMLs fiscais, certificados, boletos e uploads; novo storage precisa evitar exposição indevida
- `[!]` Integrações de pagamento exigem webhooks, idempotência e logs
- `[!]` Importações Excel/XML podem gerar dados inconsistentes se validações não forem bem definidas
- `[!]` Módulos restaurante, e-commerce e fiscal têm fluxos operacionais diferentes e podem aumentar bastante o escopo do frontend

## 13. Próximas ações imediatas

- `[ ]` Finalizar mapa completo por domínio
- `[x]` Alinhar decisões principais via AskUser
- `[>]` Transformar decisões em proposal/design/specs OpenSpec
- `[ ]` Criar proposal OpenSpec
- `[ ]` Criar design OpenSpec
- `[ ]` Criar specs OpenSpec por domínio
