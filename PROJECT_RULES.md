# PROJECT_RULES.md — Regras Oficiais do Projeto Gulini.Dev

Este é o arquivo de regras oficiais do projeto **Gulini.Dev**, portfólio profissional e landing page comercial de Wilian Gulini.

Qualquer agente de IA, desenvolvedor ou ferramenta automatizada deve seguir este arquivo antes de alterar o projeto.

## 1. Identificação do projeto

- Nome comercial: Gulini.Dev
- Domínio em produção: https://gulini.com.br/
- Repositório: https://github.com/wiliangulini/Meu-Portfolio
- Branch de trabalho/produção atual: `feature/seo-landing-conversion`
- Responsável: Wilian Gulini
- E-mail: gulini.dev@gmail.com

## 2. Natureza do projeto

O projeto é:

- portfólio profissional;
- landing page comercial;
- vitrine de projetos;
- canal de aquisição de clientes;
- base de SEO local;
- canal de contato por WhatsApp/e-mail.

O site deve comunicar autoridade, clareza, confiança e capacidade de entrega.

## 3. Stack oficial

O projeto atual utiliza:

- PHP;
- HTML;
- CSS;
- JavaScript;
- Bootstrap;
- jQuery;
- WebP;
- JSON-LD;
- robots.txt;
- sitemap.xml.

Não migrar para outro framework sem autorização explícita.

Não assumir Next.js, React, Angular, Laravel ou WordPress.

## 4. Serviços vendidos

O site deve apresentar com clareza os serviços:

- criação de sites institucionais;
- criação de landing pages;
- desenvolvimento de sistemas web sob medida;
- desenvolvimento front-end;
- React.js;
- Next.js;
- Angular;
- sistemas administrativos;
- dashboards;
- integrações com APIs;
- deploy e manutenção;
- SEO técnico.

## 5. Posicionamento regional

O SEO e a comunicação devem considerar:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- atendimento remoto para o Brasil.

Usar termos regionais com naturalidade.

É proibido fazer keyword stuffing.

## 6. Regras de versionamento

Não fazer sem autorização explícita:

- commit;
- push;
- deploy;
- merge;
- rebase;
- criação de branch;
- exclusão de branch;
- alteração em branch errada.

Antes de qualquer alteração, confirmar a branch atual.

## 7. Regras de alteração

Antes de alterar:

1. Ler o arquivo afetado.
2. Entender o impacto.
3. Preservar funcionalidades existentes.
4. Evitar mudanças amplas.
5. Não alterar arquivos fora do escopo.
6. Não quebrar rotas/links.
7. Não alterar dados de contato sem autorização.
8. Não remover CTA de WhatsApp.
9. Não remover SEO existente sem substituição melhor.
10. Não alterar `.htaccess` sem necessidade comprovada.

## 8. Arquivos principais

Arquivos sensíveis:

- `index.php`;
- `portfolio.php`;
- `assets/include/head.php`;
- `assets/include/header.php`;
- `assets/include/btn-whats.php`;
- `assets/css/styles.css`;
- `assets/js/script.js`;
- `robots.txt`;
- `sitemap.xml`;
- imagens em `assets/images/`.

Alterar esses arquivos com cautela.

## 9. SEO técnico obrigatório

Manter:

- title único por página;
- meta description única;
- canonical correto;
- robots meta adequado;
- Open Graph;
- Twitter Card;
- idioma `pt-BR`;
- H1 único por página;
- headings semânticos;
- alt text útil;
- links internos corretos;
- links externos seguros;
- sitemap.xml válido;
- robots.txt permitindo indexação;
- JSON-LD válido.

É proibido inserir `noindex`, bloquear o site no robots.txt ou alterar canonical sem justificativa.

## 10. Schema.org

Schemas permitidos quando coerentes:

- `WebSite`;
- `Person`;
- `ProfessionalService`;
- `LocalBusiness`;
- `Service`;
- `FAQPage`;
- `BreadcrumbList`;
- `CollectionPage`;
- `CreativeWork`;
- `ContactPoint`.

O schema deve refletir conteúdo visível.

É proibido inventar:

- avaliações;
- reviews;
- notas;
- clientes;
- métricas;
- depoimentos;
- resultados;
- endereço completo não confirmado.

## 11. Conteúdo e copywriting

O texto deve ser:

- claro;
- comercial;
- objetivo;
- confiável;
- natural;
- orientado a conversão;
- útil para o visitante.

O site deve responder:

- o que é oferecido;
- para quem;
- quais problemas resolve;
- quais serviços existem;
- quais tecnologias são usadas;
- quais projetos comprovam experiência;
- como pedir orçamento.

Não usar linguagem exagerada ou promessas impossíveis.

## 12. WhatsApp e contato

O WhatsApp é CTA central do site.

Não alterar o número sem autorização.

A mensagem deve ser pré-preenchida e orientada a orçamento.

Modelo recomendado:

> Olá, Wilian! Vi seu portfólio e gostaria de um orçamento para um site, landing page ou sistema web. Posso te explicar minha ideia?

Manter também contato por e-mail.

## 13. Analytics e mensuração

Não adicionar ID fictício de GA4/GTM.

Se implementar eventos, garantir fallback seguro:

- usar `gtag` se existir;
- usar `dataLayer` se existir;
- não quebrar se nenhum existir.

Eventos recomendados:

- `lead_whatsapp`;
- `lead_email`;
- `project_click`;
- `portfolio_click`;
- `social_click`;
- `nav_click`.

UTMs recomendadas:

- `utm_source`;
- `utm_medium`;
- `utm_campaign`;
- `utm_content`;
- `utm_term`.

## 14. Portfólio

Projetos devem ser reais e autorizados.

Cada projeto pode conter:

- nome;
- tipo;
- resumo;
- contexto;
- benefício;
- tecnologias;
- papel no projeto;
- imagem;
- link.

Não adicionar projetos inexistentes.

Não inventar resultados numéricos.

## 15. Performance

Preservar ou melhorar:

- imagens WebP;
- carregamento lazy em imagens abaixo da dobra;
- imagem principal otimizada;
- `width` e `height` em imagens;
- `decoding="async"` quando adequado;
- scripts sem excesso;
- CSS sem crescimento desnecessário.

Não remover bibliotecas sem validar impacto.

## 16. Acessibilidade

Manter ou melhorar:

- contraste;
- foco de teclado;
- alt text;
- nomes acessíveis em links;
- aria-labels quando úteis;
- estrutura semântica;
- navegação mobile;
- botões e links compreensíveis.

## 17. Segurança de links

Todo link externo com `target="_blank"` deve conter:

```html
rel="noopener noreferrer"
```

Não adicionar scripts externos sem necessidade.

## 18. Validações obrigatórias após alterações

Quando possível, rodar:

```bash
php -l index.php
php -l portfolio.php
php -l assets/include/head.php
php -l assets/include/btn-whats.php
git diff --check
git diff
```

Verificar também:

- H1 único por página;
- WhatsApp com mensagem correta;
- sitemap.xml válido;
- robots.txt correto;
- ausência de `noindex`;
- ausência de ID fictício de GA4/GTM;
- links externos seguros;
- JSON-LD sem erro;
- layout estável.

## 19. Critérios de aceite

Uma alteração só é aceitável se:

- não quebra o site;
- melhora ou preserva SEO;
- melhora ou preserva conversão;
- mantém dados reais;
- mantém links corretos;
- preserva identidade visual;
- não adiciona riscos desnecessários;
- é validada antes do relatório final.

## 20. Relatório final obrigatório

Toda tarefa deve terminar com relatório contendo:

1. resumo do que foi feito;
2. arquivos alterados;
3. motivo técnico;
4. motivo comercial/SEO;
5. comandos executados;
6. resultado das validações;
7. riscos restantes;
8. pendências para Wilian;
9. próximos passos.

## 21. Pendências externas recorrentes

Normalmente dependem de Wilian:

- ID real do GA4 ou GTM;
- acesso/verificação no Google Search Console;
- envio do sitemap;
- criação/otimização do Google Business Profile;
- coleta de depoimentos reais;
- criação de imagem Open Graph 1200x630;
- divulgação no LinkedIn;
- divulgação na Workana;
- campanhas com UTM.

## 22. Princípio final

O projeto deve ser simples, rápido, honesto, indexável, acessível e comercialmente forte.

SEO não deve ser tratado como promessa de ranking. SEO deve ser tratado como base técnica, conteúdo claro, autoridade, mensuração e melhoria contínua.
