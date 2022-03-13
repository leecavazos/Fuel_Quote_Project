const request = require("supertest");
const app = require('../routes/index');
describe('Testing Backend Connections', () =>{
    test('Testing root Connection',() => {
        console.log("Requesting routes\n");
        return request(app).get("/").expect(200);
    });
});