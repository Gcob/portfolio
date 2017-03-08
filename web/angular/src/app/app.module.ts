import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent }  from './app.component';
import { NavBarComponent } from './navbar.component';

@NgModule({
  imports:      [ BrowserModule ],
  declarations: [ AppComponent, NavBarComponent ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
