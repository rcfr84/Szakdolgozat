describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/advertisements/create')
    cy.get('input[id=email]').type('v@gmail.com')
    cy.get('input[id=password]').type('12345678')

    cy.contains('Log in').click()

    cy.get('select[id=countySelect]').select('Heves vármegye')
    cy.get('select[id=citySelect]').select('Eger')
    cy.get('select[id=category]').select('Elektronika')
    cy.get('input[id=title]').type('Iphone 12')
    cy.get('input[id=price]').type('100000')
    cy.get('label[for=description]').next('textarea').type('Iphone 12 64gb');
    cy.get('input[id=mobile_number').type('06301234567')

    cy.contains('Hozzáadás').click()
    
    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements')
  })
})