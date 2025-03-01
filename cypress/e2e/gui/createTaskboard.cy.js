import { faker } from "@faker-js/faker"

describe('Test create a taskboard', () => {
    const taskboard = {
        title: faker.lorem.words({ min: 1, max: 4 }),
        description: faker.lorem.words({ min: 5, max: 10 })
    }
    
    beforeEach(() => {
        cy.guiLoginUser()
    })


    it('Test create task board', () => {
        cy.guiCreateTaskboard(taskboard)
        cy.get('[data-qa-selector="form-alert"]').should('be.visible')
    })
})
