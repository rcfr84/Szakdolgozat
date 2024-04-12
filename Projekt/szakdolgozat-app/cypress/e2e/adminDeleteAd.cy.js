describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.get('svg[fill="red"]').eq(1).should('be.visible').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres törlés!').should('have.length', 1);
  })
})