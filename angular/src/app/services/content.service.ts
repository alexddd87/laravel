import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Service} from "./service";
import "rxjs/add/operator/map";
import 'rxjs/add/operator/catch';
import 'rxjs/add/observable/throw';

@Injectable()
export class ContentService extends Service {

    constructor(protected _http: Http) {
        super(_http, 'content');
    }
}
