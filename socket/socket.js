const express = require("express")
const app = express()

const http = require("http").createServer(app)
const io = require("socket.io")(http, { origins: '*:*' })

io.on("connection", (socket) => {
    console.log(`User connected!`)

    socket.on("message", (data) => {
        socket.broadcast.emit("message", data)
    })

    socket.on("disconnect", () => {
        console.log(`User disconnected!`)
    })
})

app.get('/', (_, res) => {
    res.sendFile(__dirname + '/index.html');
});

http.listen(3000, () => {
    console.log("Server is listening right now")
})