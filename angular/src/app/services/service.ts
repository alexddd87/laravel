import {Http, Response, RequestOptions, Headers} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {Injectable} from "@angular/core";

@Injectable()
export class Service {
    protected baseURL: string = "http://laravel.local/api/";
    protected modelName;

    public constructor(protected _http: Http, modelName) {
        this.modelName = modelName;
    }

    public configuration(): RequestOptions {
        let headers = new Headers({
            'Content-Type': 'application/json;charset=UTF-8'
        });
        let options = new RequestOptions({headers: headers});
        return options;
    }

    public handleErrors(error: any) {
        return Observable.throw(error);
    }

    protected getData(r: Response) {
        return r.json();
    }

    public index() {
        let options = this.configuration();
        return this._http.get(this.baseURL + this.modelName, options).map(this.getData);
    }

    public show(id: number) {
        let options = this.configuration();
        return this._http.get(this.baseURL + this.modelName + "/" + id, options).map(this.getData)
            .catch(this.handleErrors);
    }

    public create(model) {
        let json = JSON.stringify(model);
        let options = this.configuration();
        return this._http.post(
            this.baseURL + this.modelName + "/",
            json,
            options).map(this.getData).catch(this.handleErrors);
    }

    public update(model) {
        let json = JSON.stringify(model);
        let options = this.configuration();
        return this._http.put(
            this.baseURL + this.modelName + "/" + model.id,
            json,
            options).map(this.getData).catch(this.handleErrors);
    }

    public destroy(id: number) {
        return this._http.delete(this.baseURL + this.modelName + '/' + id)
            .catch(this.handleErrors);
    }

    public subirImagen(file: File) {
        return new Promise((resolve, reject) => {
            let formData: any = new FormData();
            let xhr = new XMLHttpRequest();
            formData.append("file", file, file.name);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        resolve(JSON.parse(xhr.response));
                    } else {
                        reject(xhr.response);
                    }
                }
            };
            xhr.open("POST", this.baseURL + "/upload-file", true);
            xhr.send(formData);
        });
    }
}