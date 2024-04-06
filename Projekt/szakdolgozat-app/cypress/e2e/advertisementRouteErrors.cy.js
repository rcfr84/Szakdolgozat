describe('template spec', () => {
  it('passes', () => {

    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/25/show')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements/25/show')

    cy.visit('http://127.0.0.1:8000/advertisements/100/show')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen hirdetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/advertisements/-1/show')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen hirdetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/advertisements/100/edit')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements/own')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen hirdetés!').should('have.length', 1);

  })

})