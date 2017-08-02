import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { Http, Headers, RequestOptions } from "@angular/http";
import { Observable } from "rxjs/Rx";

import "rxjs/add/operator/map";
import "rxjs/add/operator/catch";


@Component({
  selector: 'app-room-list',
  templateUrl: './room-list.component.html',
  styleUrls: ['./room-list.component.css']
})
export class RoomListComponent implements OnInit {

  @Input('room') roomList: Object[];

  constructor(private http:Http) { }

  ngOnInit() {
  }

  <td *ngIf = "room.status == 1; else firstTemp">
  <div style="color:green"> Available </div>
  </td> 
  <!--Else --> <ng-template #firstTemp> <td>
  <div style="color:red"> Unavailable </div></td> 
  </ng-template>

}
