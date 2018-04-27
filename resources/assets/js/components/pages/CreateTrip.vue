<template>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 col-xl-4">
        <div class="form-group">
          <label for="location">Location</label>
          <input type="text" class="form-control" name="location" id="location" placeholder="Your new trip">
          <!-- <div v-if="errors.has('location')">
            <div class="invalid-feedback" v-for="error in errors.get('location')" :key="error.id">
              {{ error }}
            </div>
          </div> -->
      </div>
      <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" name="content" rows="5"></textarea>
          <!-- <div v-if="errors.has('content')">
            <div class="invalid-feedback" v-for="error in errors.get('content')" :key="error.id">
              {{ error }}
            </div>
          </div> -->
      </div>
      <div class="form-group">
          <label for="image">Image - Use a picture to promove your trip</label>
          <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>
</div>
</template>
<script>
export default {
  
}
</script>
<style>

</style>
