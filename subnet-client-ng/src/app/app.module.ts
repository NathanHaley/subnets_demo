import { Routes, RouterModule } from '@angular/router';
import {SubnetListComponent} from "./subnet-list/subnet-list.component";
import {BrowserModule} from "@angular/platform-browser";
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';
import { HttpClientModule } from  '@angular/common/http';
import {HttpModule} from "@angular/http";

const routes: Routes = [
    { path: 'subnets', component: SubnetListComponent },
    { path: '**', redirectTo: '', pathMatch: 'full' }
];

@NgModule({
    declarations: [
        AppComponent,
        SubnetListComponent
    ],
    imports: [
        BrowserModule,
        HttpModule,
        HttpClientModule,
        RouterModule.forRoot(routes)
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule { }



