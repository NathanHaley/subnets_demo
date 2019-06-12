import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs';

export interface Subnet {
    id: Number,
    subnet: String,
    cidr: Number
}

const API_URL: string = 'http://demo.test';

@Injectable({
  providedIn: 'root'
})
export class SubnetService {
    private headers;

    constructor(private http: Http) {
        this.init();
    }

    async init() {
    }

    getSubnets(): Observable<Subnet[]> {
        return this.http.get(API_URL + '/subnets',
            new RequestOptions({ headers: this.headers })
        )
            .map(res => {
                let modifiedResult = res.json();
                modifiedResult = modifiedResult.map(function(subnet) {
                    subnet.isUpdating = false;
                    return subnet;
                });
                return modifiedResult;
            });
    }
}
