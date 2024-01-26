describe('template spec', () => {
  it('passes', () => {
    
    cy.visit('http://127.0.0.1:8000/advertisements/7/edit')
    cy.get('input[id=email]').type('v@gmail.com')
    cy.get('input[id=password]').type('12345678')

    cy.contains('Log in').click()

    cy.get('select[id=countySelect]').select('Heves vármegye')
    cy.get('select[id=citySelect]').select('Eger')
    cy.get('input[id=title]').clear()
    cy.get('input[id=title]').type('Répa')
    cy.get('input[id=mobile_number]').clear()
    cy.get('input[id=mobile_number]').type('06305567801')

    cy.contains('Módosítás').click()

    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements/own')

  })
})