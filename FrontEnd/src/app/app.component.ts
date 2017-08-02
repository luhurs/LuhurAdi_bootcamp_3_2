import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  roomList : Object[] = [
    {"id":"1", "name":"Room1", "price":1000, "img":"", "desc":"A"},
    {"id":"2", "name":"Room2", "price":2000, "img":"", "desc":"B"},
    {"id":"3", "name":"Room3", "price":2500, "img":"", "desc":"C"}
  ];

}
