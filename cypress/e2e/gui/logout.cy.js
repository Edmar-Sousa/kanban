
describe('Test login page', () => {

    beforeEach(() => {
        cy.guiLoginUser()
    })

    it('Logout user', () => {
        cy.get('a[href*="logout"]').click()
        cy.get('h1').should('have.text', 'Acesse a plataforma')
    })
})