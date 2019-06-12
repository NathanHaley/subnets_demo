import { Component, OnInit } from '@angular/core';
import { Subnet, SubnetService } from '../subnet.service';
import 'rxjs/Rx';

@Component({
    selector: 'app-subnet-list',
    templateUrl: './subnet-list.component.html',
    styleUrls: ['./subnet-list.component.css']
})

export class SubnetListComponent implements OnInit {

    subnets: Subnet[];
    errorMessage: string;
    isLoading: boolean = true;
    isShown: Array<boolean> = [];
    infoStub: object = {"ip": 0};
    info: object = null;

    constructor(private subnetService: SubnetService) {}

    ngOnInit() {
        this.info = this.infoStub;
        this.getSubnets();
    }

    getSubnets() {
        this.subnetService
            .getSubnets()
            .subscribe(
                subnets => {
                        this.subnets = subnets;

                        subnets.forEach(function (subnet) {
                            this.isShown[subnet.id.toString()] = false;
                        }, this);

                        this.isLoading = false;
                    },
                    error => this.errorMessage = <any>error
            );
    }

    toggleShow(id) {
        this.isShown[id] = ! this.isShown[id];
        this.info = this.infoStub;
    }

    toggleInfo(ip) {
        if (ip == this.info) {
            this.info = this.infoStub;
        } else {
            this.info = ip;
        }
    }

}