describe('Test login page', () => {
  it('Login with error data', () => {
    const userEmail = Cypress.env('user_email')
    const userPassword = Cypress.env('user_password')

    cy.guiLoginUser(userEmail, userPassword)

    cy.get('header h1').should('have.text', 'Boards')
  })
})