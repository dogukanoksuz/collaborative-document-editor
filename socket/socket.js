/**
 * @type {any}
 * 
 * COLLABORATIVE DOCUMENT EDITOR
 * SOCKET SRV BY DIVERGENT
 * 
 */
const WebSocket = require('ws')
const http = require('http')
const StaticServer = require('node-static').Server
const setupWSConnection = require('y-websocket/bin/utils.js').setupWSConnection

const production = process.env.PRODUCTION != null
const port = 9000

const staticServer = new StaticServer('.', { cache: production ? 3600 : false, gzip: production })

const server = http.createServer((request, response) => {
  request.addListener('end', () => {
    staticServer.serve(request, response)
  }).resume()
})
const wss = new WebSocket.Server({ server })

wss.on('connection', (conn, req) => setupWSConnection(conn, req))

server.listen(port)

console.log(`Listening to wss://localhost:${port} ${production ? '(production)' : ''}`)
