<template>
  <div id="app">
    <vu-header/>
    <router-view/>
  </div>
</template>
<script>
import vuHeader from './components/layout/Header';

export default {
  name: 'app',
  components: { vuHeader }
}
</script>
