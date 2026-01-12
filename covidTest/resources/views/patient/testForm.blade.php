@extends('patient.navbar')
@section('content')

  
<div class="row g-4">
            <div class="col-lg-8">
              <div class="cc-card p-4">
                <h5 class="fw-bold mb-1">COVID Test Request</h5>
                <div class="cc-subtitle mb-4">Fill details and choose a preferred slot. Hospital will approve/reject.</div>

                <form method="POST" action="{{route('testBook')}}">
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

                    <!-- Test Type -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Test Type</label>
                      <select name="test_type" class="form-select" required>
                        <option value="" selected disabled>Choose test type</option>
                        <option value="PCR">PCR</option>
                        <option value="Antigen">Antigen</option>
                      </select>
                      @error('test_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Preferred Date</label>
                      <input type="date" name="preferred_date" class="form-control" required>
                      @error('preferred_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Time Slot -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Preferred Time Slot</label>
                      <select name="time_slot" class="form-select" required>
                        <option value="" selected disabled>Select slot</option>
                        <option value="09:00-09:30">09:00 AM - 09:30 AM</option>
                        <option value="10:00-10:30">10:00 AM - 10:30 AM</option>
                        <option value="11:00-11:30">11:00 AM - 11:30 AM</option>
                        <option value="12:00-12:30">12:00 PM - 12:30 PM</option>
                      </select>
                      @error('time_slot') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Sample -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Sample Type</label>
                      <select name="sample_type" class="form-select" required>
                        <option value="" selected disabled>Choose sample</option>
                        <option value="Nasal Swab">Nasal Swab</option>
                        <option value="Throat Swab">Throat Swab</option>
                        <option value="Saliva">Saliva</option>
                      </select>
                      @error('sample_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Symptoms -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Symptoms (optional)</label>
                      <input type="text" name="symptoms" class="form-control"
                             placeholder="e.g. fever, cough, sore throat">
                      @error('symptoms') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Notes -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Notes (optional)</label>
                      <textarea name="notes" class="form-control" rows="3"
                                placeholder="Any extra information for hospital..."></textarea>
                      @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                      <div class="alert alert-warning rounded-4 mb-0">
                        <b>Status:</b> Your test request will be <b>Pending</b> until the hospital approves it.
                      </div>
                    </div>

                    <div class="col-12 d-grid d-sm-flex gap-2 justify-content-end mt-2">
                      <button class="btn btn-cc btn-cc-outline px-5" type="reset">Clear</button>
                      <button class="btn btn-cc btn-cc-primary px-5" type="submit">Submit Test Request</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>

            <!-- Right Side Info -->
            <div class="col-lg-4">
              <div class="cc-card p-4 h-100">
                <h6 class="fw-bold mb-2">What happens next?</h6>
                <ul class="mb-0">
                  <li class="mb-2">Hospital receives your request</li>
                  <li class="mb-2">Hospital approves / rejects</li>
                  <li class="mb-2">After test, hospital updates result</li>
                  <li>You can download report from “Results”</li>
                </ul>
              </div>
            </div>

          </div>
        
        </div>

@endsection