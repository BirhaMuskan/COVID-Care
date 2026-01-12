@extends('patient.navbar');

@section('content')
<div class="row g-4">
            <div class="col-lg-8">
              <div class="cc-card p-4">
                <h5 class="fw-bold mb-1">Vaccination Appointment</h5>
                <div class="cc-subtitle mb-4">Select dose and slot. Hospital will confirm availability.</div>

                <form method="POST" action="{{route('vaccineBook')}}">
                  @csrf

                  <div class="row g-3">

                    <!-- Hospital -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Select Hospital</label>
                      <select name="hospital_id" class="form-select" required>
                        <option value="" selected disabled>Choose hospital</option>
                       
                          <option value="{{$hospital->id}}" selected>{{ $hospital->name }}</option>
                      </select>
                      @error('hospital_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Dose -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Dose</label>
                      <select name="dose_no" class="form-select" required>
                        <option value="" selected disabled>Select dose</option>
                        <option value="1">Dose 1</option>
                        <option value="2">Dose 2</option>
                        <option value="booster">Booster</option>
                      </select>
                      @error('dose_no') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Vaccine Type -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Vaccine Type</label>
                      <select name="vaccine_type" class="form-select" required>
                        <option value="" selected disabled>Select vaccine</option>
                        <option value="Pfizer">Pfizer</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                      </select>
                      @error('vaccine_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-md-3">
                      <label class="form-label fw-semibold">Preferred Date</label>
                      <input type="date" name="preferred_date" class="form-control" required>
                      @error('preferred_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Time Slot -->
                    <div class="col-md-3">
                      <label class="form-label fw-semibold">Preferred Slot</label>
                      <select name="time_slot" class="form-select" required>
                        <option value="" selected disabled>Select slot</option>
                        <option value="09:00-09:30">09:00 - 09:30</option>
                        <option value="10:00-10:30">10:00 - 10:30</option>
                        <option value="11:00-11:30">11:00 - 11:30</option>
                        <option value="12:00-12:30">12:00 - 12:30</option>
                      </select>
                      @error('time_slot') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Allergy / Medical -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Allergy / Medical Condition (optional)</label>
                      <input type="text" name="medical_notes" class="form-control"
                             placeholder="e.g. allergy, blood pressure, diabetes">
                      @error('medical_notes') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                      <div class="alert alert-info rounded-4 mb-0">
                        <b>Note:</b> Hospital may adjust your slot depending on vaccine availability.
                      </div>
                    </div>

                    <div class="col-12 d-grid d-sm-flex gap-2 justify-content-end mt-2">
                      <button class="btn btn-cc btn-cc-outline px-5" type="reset">Clear</button>
                      <button class="btn btn-cc btn-cc-success px-5" type="submit">Submit Vaccination Request</button>
                    </div>

                  </div>
                </form>

              </div>
            </div>

            <!-- Right Side Info -->
            <div class="col-lg-4">
              <div class="cc-card p-4 h-100">
                <h6 class="fw-bold mb-2">After booking</h6>
                <ul class="mb-0">
                  <li class="mb-2">Hospital approves your vaccination request</li>
                  <li class="mb-2">Vaccination status updates after appointment</li>
                  <li class="mb-2">Dose history appears in your dashboard</li>
                  <li>Book next dose when needed</li>
                </ul>
              </div>
            </div>

          </div>
        
        </div>
        @endsection