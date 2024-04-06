describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/cities/1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/cities/1')

    cy.visit('http://127.0.0.1:8000/cities/100000')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/counties')
    cy.get('.bg-red-500').should('be.visible').contains('Nem található a keresett város!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/cities/-1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/counties')
    cy.get('.bg-red-500').should('be.visible').contains('Nem található a keresett város!').should('have.length', 1);
  })
})