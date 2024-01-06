<script setup>
    import { ref } from "vue";

    import { useRouter } from 'vue-router';

    import api from "../../api";

    const router = useRouter();


    const name = ref("");
    const errors = ref([]);

    const storeProdis = async () => {

        let formData = new FormData();

        formData.append("name", name.value);

        await api.prodis('/api/prodis', formData)
        .then(() => {
            router.push({ path: "/prodis" });
        })
        .catch((error) => {
            errors.value = error.response.data;
        });
    };
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storeProdis()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" class="form-control" v-model="name" placeholder="Nama Prodi">
                                <div v-if="errors.name" class="alert alert-danger mt-2">
                                    <span>{{ errors.name[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>