import { faker } from "@faker-js/faker"

describe('Test create Task', () => {

    const task = {
        title: faker.lorem.words({ min: 3, max: 5 }),
        description: faker.lorem.words({ min: 3, max: 6 }),

        datestart: new Date(Date.now()).toLocaleDateString('pt-br') + `${ new Date(Date.now()).getHours() + 1 }:00`,
        dateend: new Date(Date.now()).toLocaleDateString('pt-br') + `${ new Date(Date.now()).getHours() + 2 }:00`,

        taskboard: {
            title: faker.lorem.words({ min: 1, max: 3 }),
            description: faker.lorem.words({ min: 3, max: 6 }),
        }
    }

    beforeEach(() => {
        cy.guiLoginUser()
        cy.guiCreateTaskboard(task.taskboard)
    })

    it('Test create task in taskboard', () => {
        cy.guiCreateTaskInTaskboard(task)

        cy.get('button[arial-label="Close modal"]').eq(0).click()
        cy.contains(task.title).should('be.visible')
        cy.contains(task.description).should('be.visible')
    })

})