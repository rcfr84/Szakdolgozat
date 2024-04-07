describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/1/edit')
    cy.contains('Képek törlése').click()
    cy.get('svg').eq(2).click()
    cy.location('href').should('eq', 'http://127.0.0.1:8000/pictures/1')
    cy.get('.bg-green-500').should('be.visible').contains('Kép sikeresen törölve!').should('have.length', 1);
  })
})