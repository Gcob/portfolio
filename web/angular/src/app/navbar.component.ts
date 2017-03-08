import { Component, HostListener } from '@angular/core';

@HostListener('window:scroll', ['$event'])
@Component({
  selector: 'navbar',
  templateUrl: 'html/navbar.component.html'
})

export class NavBarComponent  {
  docIsScrolled = false;
}
