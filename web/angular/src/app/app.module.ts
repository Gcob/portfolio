import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ActivatedRoute, RouterModule, Routes } from '@angular/router';
import { HttpModule, JsonpModule } from '@angular/http';

import { AppComponent }  from './app.component';
import { AproposComponent }  from './apropos.component';
import { ProjetsComponent }  from './projets.component';
import { JoindreComponent }  from './joindre.component';
import { HomeComponent }  from './home.component';
import { NavBarComponent } from './navbar.component';



const appRoutes: Routes = [
  { path: '', redirectTo: '/fr', pathMatch: 'full' },

  { path: 'fr',           component: HomeComponent,   pathMatch: 'full',  data: { locale: 'fr' }},
  { path: 'fr/a-propos',  component: AproposComponent,pathMatch: 'full',  data: { locale: 'fr' } },
  { path: 'fr/projets',   component: ProjetsComponent,pathMatch: 'full',  data: { locale: 'fr' } },
  { path: 'fr/joindre',   component: JoindreComponent,pathMatch: 'full',  data: { locale: 'fr' } }

  { path: 'en',           component: HomeComponent,   pathMatch: 'full',  data: { locale: 'en' }},
  { path: 'en/a-propos',  component: AproposComponent,pathMatch: 'full',  data: { locale: 'en' } },
  { path: 'en/projets',   component: ProjetsComponent,pathMatch: 'full',  data: { locale: 'en' } },
  { path: 'en/joindre',   component: JoindreComponent,pathMatch: 'full',  data: { locale: 'en' } }
];

@NgModule({
  imports:      [
    BrowserModule,
    RouterModule.forRoot(appRoutes),
    HttpModule,
    JsonpModule,
    
  ],
  declarations: [ 
    AppComponent, 
    NavBarComponent, 
    AproposComponent, 
    ProjetsComponent,
    JoindreComponent,
    HomeComponent,
    
   
  ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
