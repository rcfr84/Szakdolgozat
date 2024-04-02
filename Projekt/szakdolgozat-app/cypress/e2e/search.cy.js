describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.get('input[name="search"]').type('Példa');
    cy.contains('Keresés').click();

    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.contains('Keresés').click()
    cy.get('.p-4.mb-4.text-sm.text-red-800.rounded-lg.bg-red-50').should('be.visible');
    cy.contains('Adj meg legalább 4 karaktert.').should('be.visible')

    cy.contains('Keresés').click()
    cy.get('input[name="search"]').type('Pél');
    cy.get('.p-4.mb-4.text-sm.text-red-800.rounded-lg.bg-red-50').should('be.visible');
    cy.contains('Adj meg legalább 4 karaktert.').should('be.visible')
    
  })
})