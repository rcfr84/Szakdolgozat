describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/cities/county/4')
    cy.get('svg[fill="red"]').eq(0).should('be.visible').click()
    cy.location('href').should('eq', 'http://127.0.0.1:8000/cities/county/4')
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres törlés!').should('have.length', 1);
  })
})