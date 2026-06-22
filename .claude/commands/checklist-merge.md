# /checklist-merge

Atue como revisor final antes de merge.

Não altere arquivos.

Verifique:

1. `git status`;
2. `git diff`;
3. arquivos alterados;
4. aderência ao escopo;
5. riscos de regressão;
6. autenticação/autorização;
7. banco/migrations;
8. build;
9. lint;
10. typecheck;
11. testes;
12. documentação necessária;
13. impacto em deploy;
14. arquivos sensíveis alterados;
15. dependências adicionadas.

Entregue checklist:

- [ ] Escopo respeitado
- [ ] Sem alteração destrutiva
- [ ] Sem secrets expostos
- [ ] Sem dependência desnecessária
- [ ] Sem quebra de contrato
- [ ] Build validado
- [ ] Testes/lint/typecheck validados
- [ ] Riscos documentados
- [ ] Pronto para merge ou requer ajustes

Finalize com decisão objetiva.
