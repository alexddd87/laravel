// Importar el núcleo de Angular
import {Component, OnInit} from "@angular/core";
import {Router} from "@angular/router";
import {ContentService} from "../../services/content.service";
import {BaseComponent} from "../base.component";

// Decorador component, indicamos en que etiqueta se va a cargar la plantilla
@Component({
    selector: 'restaurantes-list',
    templateUrl: './app/views/content/content-list.html',
    providers: [ContentService]
})

// Clase del componente donde iran los datos y funcionalidades
export class ContentIndexComponent extends BaseComponent implements OnInit {
    public title: string = "Content";
    public module: string = "content";

    constructor(private _service: ContentService,
                private _router: Router) {
        super(_service, _router);
    }

    ngOnInit() {
        this.getAll();
    }
}