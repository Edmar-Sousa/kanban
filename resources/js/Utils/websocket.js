
class WebSocketClient {

    constructor() {
        this.connection = new WebSocket('ws://localhost:8091')

        this.connection.onopen = () => console.log('ok')
    }


    send(data) {
        if ( !this.connection.OPEN )
            throw new Error('Socket is closed')

        this.connection.send(JSON.stringify(data))
    }


    async recv(event, callback) {

        this.connection.onmessage = payload => {
            const payloadjson = JSON.parse(payload.data)

            if (payloadjson.event == event)
                callback(payloadjson.data)
        }

    }

}


export default new WebSocketClient()
