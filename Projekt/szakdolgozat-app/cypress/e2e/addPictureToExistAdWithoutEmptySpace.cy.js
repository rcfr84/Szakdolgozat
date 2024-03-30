describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/own')
    cy.get('td.px-4.py-2 a').eq(0).click();
    
    cy.contains('Új kép hozzáadása').click()
    
    cy.contains('Maximum csak 5 kép engedélyezett.');
    
  })
})