import { TestBed } from '@angular/core/testing';

import { SubnetService } from './subnet.service';

describe('SubnetService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SubnetService = TestBed.get(SubnetService);
    expect(service).toBeTruthy();
  });
});
