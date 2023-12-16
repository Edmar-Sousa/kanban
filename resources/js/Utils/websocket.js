
class WebSocketClient {

    constructor() {
        this.connection = null
        this.callbacks = {}
    }


    connect(token) {

        if (!this.connection)
        {
            this.connection = new WebSocket('ws://localhost:8091')

            this.connection.addEventListener('open', () => {
                this.connection.send(JSON.stringify({ event: 'auth', token }))
            })


            this.connection.onmessage = payload => {
                const payloadjson = JSON.parse(payload.data)
                const callback = this.callbacks[payloadjson.event]
    
                if (callback)
                    callback(payloadjson.data)
            }
        }

    }


    send(data) {
        if ( !this.connection.OPEN )
            throw new Error('Socket is closed')

        this.connection.send(JSON.stringify(data))
    }


    async recv(event, callback) {
        this.callbacks[event] = callback
    }

}


export default new WebSocketClient()
