describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/advertisements/create')

    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.get('select[id=countySelect]').select('Heves vármegye')
    cy.get('select[id=citySelect]').select('Verpelét')
    cy.get('select[id=category]').select('Játék')

    
    cy.get('input[id=title]').type('Eladó kutya játék')
    cy.get('input[id=price]').type('1000000000')
    cy.get('label[for=description]').next('textarea').type('Eladó kék kutya játék, 10 cm hosszú.');
    cy.get('input[id=mobile_number').type('06301234567000000000000000000000')

    cy.contains('Hozzáadás').click()

    cy.get('.text-red-800').should('be.visible').contains('A telefonszám mező nem lehet hosszabb 20 karakternél.').should('have.length', 1);

  })
})