<script setup>
    import { ref } from "vue";

    import { useRouter } from 'vue-router';

    import api from "../../api";

    const router = useRouter();

    const image = ref("");
    const name = ref("");
    const matkul = ref("");
    const errors = ref([]);

    const handleFileChange = (e) => {
        image.value = e.target.files[0];
    };

    const storeDosens = async () => {

        let formData = new FormData();

        formData.append("image", image.value);
        formData.append("name", name.value);
        formData.append("matkul", matkul.value);

        await api.dosens('/api/dosens', formData)
        .then(() => {
            router.push({ path: "/dosens" });
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
                        <form @submit.prevent="storeDosens()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" class="form-control" @change="handleFileChange($event)">
                                <div v-if="errors.image" class="alert alert-danger mt-2">
                                    <span>{{ errors.image[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" class="form-control" v-model="name" placeholder="Nama Dosen">
                                <div v-if="errors.name" class="alert alert-danger mt-2">
                                    <span>{{ errors.name[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Matkul</label>
                                <textarea class="form-control" v-model="matkul" rows="5" placeholder="Mata Kuliah diampu Dosen"></textarea>
                                <div v-if="errors.matkul" class="alert alert-danger mt-2">
                                    <span>{{ errors.matkul[0] }}</span>
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