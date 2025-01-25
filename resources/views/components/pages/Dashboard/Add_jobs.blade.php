@props(['user'=>null])
<x-pages.Dashboard.Dashboard :user='$user'>
  <form action="/company/add-job"  method="POST"  class="container p-4 flex flex-col w-full items-start gap-3" >
    @csrf <!-- CSRF Token for security -->

    <!-- Job Title -->
    <div class="w-full">
      <label for="job-title" class="block font-semibold mb-2">Job Title</label>
      <input id="job-title" type="text" name="Job_title" placeholder="Type Here" required class="w-full max-w-lg px-3 py-2 border-2 border-gray-300 rounded"  />
    </div>

    <!-- Job Description -->
    <div class="w-full max-w-lg">
      <label for="job-description" class="block font-semibold my-2">Job Description</label>
      <div id="quill-editor"></div>
      <textarea  id="quill-editor-area" name="job_description" class="hidden" rows="3"></textarea>
    </div>

    <!-- Job Details -->
    <div class="flex flex-col sm:flex-row gap-2 w-full sm:gap-8 mt-2">
      <!-- Job Category -->
      <div>
        <label for="job-category" class="block font-semibold mb-2">Job Category</label>
        <select id="job-category" name="job_category" class="w-full px-3 py-2 border-2 border-gray-300 rounded">
          <option value="Information Technology">Information Technology</option>
          <option value="Healthcare">Healthcare</option>
          <option value="Skilled Trades">Skilled Trades</option>
          <option value="Sales and Marketing">Sales and Marketing</option>
          <option value="Education and Training">Education and Training</option>
          <option value="Hospitality and Tourism">Hospitality and Tourism</option>
          <option value="Finance and Accounting">Finance and Accounting</option>
          <option value="Engineering">Engineering</option>
          <option value="Logistics and Supply Chain">Logistics and Supply Chain</option>
          <option value="Administrative Support">Administrative Support</option>
        </select>
      </div>

      <!-- Job Location -->
      <div>
        <label for="job-location" class="block font-semibold mb-2">Job Location</label>
        <select id="job-location" name="job_location" class="w-full px-3 py-2 border-2 border-gray-300 rounded">
          <option value="Dhaka">Dhaka</option>
          <option value="Chattogram">Chattogram</option>
          <option value="Khulna">Khulna</option>
          <option value="Rajshahi">Rajshahi</option>
          <option value="Barishal">Barishal</option>
          <option value="Sylhet">Sylhet</option>
          <option value="Rangpur">Rangpur</option>
          <option value="Mymensingh">Mymensingh</option>>
        </select>
      </div>

      <!-- Job Level -->
      <div>
        <label for="job-level" class="block font-semibold mb-2">Job Level</label>
        <select id="job-level" name="job_level" class="w-full px-3 py-2 border-2 border-gray-300 rounded">
          <option value="Beginner Level">Beginner Level</option>
          <option value="Intermediate Level">Intermediate Level</option>
          <option value="Senior Level">Senior Level</option>
        </select>
      </div>
    </div>

    <!-- Job Salary -->
    <div>
      <label for="job-salary" class="block font-semibold mb-2">Job Salary</label>
      <input id="job-salary" type="number" name="job_Salary" placeholder="20000" min="0" class="w-full px-3 py-2 border-2 border-gray-300 rounded sm:w-[120px]" />
    </div>

    <!-- Submit Button -->
    <button type="submit" class="w-28 py-3 mt-4 bg-black text-white rounded"> Add</button>
  </form>

  <!-- Quill Editor -->
  <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const quillEditorContainer = document.getElementById('quill-editor');
      const hiddenTextarea = document.getElementById('quill-editor-area');
      
      if (quillEditorContainer && hiddenTextarea) {
        const quill = new Quill(quillEditorContainer, { theme: 'snow' });

        quill.on('text-change', function () {
          hiddenTextarea.value = quill.root.innerHTML;
        });

        hiddenTextarea.addEventListener('input', function () {
          quill.root.innerHTML = hiddenTextarea.value;
        });
      }
    });
  </script>
</x-pages.Dashboard.Dashboard>
