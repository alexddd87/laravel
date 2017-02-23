// Importar el núcleo de Angular
import {Component} from "@angular/core";
import {Router} from "@angular/router";

// Decorador component, indicamos en que etiqueta se va a cargar la plantilla
@Component({
    selector: 'navigation',
    templateUrl: 'app/view/layouts/main_menu.html'
})

// Clase del componente donde iran los datos y funcionalidades
export class MenuComponent {

    constructor(private _router: Router) {

    }
}