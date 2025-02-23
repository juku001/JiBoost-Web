<template>
    <!-- header begin -->
    <div class="header header-style-1">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="top-left">
                            <div class="d-sm-flex">
                                <div class="header-txt pr-30"><a href="mail:thespidergraphics@gmail.com"><i
                                            class="icofont-email"></i> thespidergraphics@gmail.com</a></div>
                                <div class="header-txt px-30"><a href="tel:+255615331132"><i class="icofont-phone"></i>
                                        +255 615 331 132</a></div>
                                <div class="header-txt pl-30"><i class="icofont-google-map"></i> Makumbusho, Dar es
                                    salaam. Tanzania</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="top-right">
                            <div class="d-flex justify-content-lg-end justify-content-center">
                                <a href="#" class="header-right-txt"><i class="icofont-facebook-messenger"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-twitter"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-instagram"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-youtube"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- header end -->
    <section v-if="step === 1">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12" id="signup-spacing">
                    <div class="banner-txt text-center">
                        <h3 class="banner-subtitle mt--9 mb-10">Create Account</h3>
                        <h1 class="banner-title mb-20 cd-headline push">
                            <span>Welcome to JiBoost</span>
                        </h1>
                        <p class="banner-paragraph mb-11">
                            Are you a Student, Teacher or Parent ?
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center" id="signup-spacing">
                    <h5 class="fw-bold">Select User Type</h5>
                    <div class="mt-5 mb-4">
                        <img :src="userImage" alt="User Type" width="250">
                    </div>
                    <div class="row mt-5">
                        <div class="col-4 text-center">
                            <input type="radio" name="user-type" id="student" value="student" v-model="userType">
                            <label for="student" class="jb-radio">Student</label>
                        </div>
                        <div class="col-4 text-center">
                            <input type="radio" name="user-type" id="parent" value="parent" v-model="userType">
                            <label for="parent" class="jb-radio">Parent</label>
                        </div>
                        <div class="col-4 text-center">
                            <input type="radio" name="user-type" id="teacher" value="teacher" v-model="userType">
                            <label for="teacher" class="jb-radio">Teacher</label>
                        </div>
                        <div class="col-12 mt-2">
                            <button @click="nextStep" class="btn btn-jb-primary">Continue</button>
                            <p class="mt-2"><span>Already have an Account? <a href="/login">Click here</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if="step === 2">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center mt-3">
                    <h2 class="section-title">{{ formTitle }}</h2>
                    <h3 class="banner-paragraph">Fill the following form to register</h3>
                </div>
                <div class="text-center">
                    <span class="signup-step active" id="signup-step-1">1</span>
                    <span class="signup-step" id="signup-step-2">2</span>
                    <span class="signup-step" id="signup-step-3">3</span>
                </div>

                <div class="form-content container-fluid">

                    <form @submit.prevent="nextStep">
                        <div class="row">
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.firstName"
                                    placeholder="First Name" required />
                            </div>
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.lastName" placeholder="Last Name"
                                    required />
                            </div>
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.mobile" placeholder="Mobile"
                                    required />
                            </div>

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="email" v-model="form.email" placeholder="Email"
                                    required />
                            </div>
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="password" v-model="form.password"
                                    placeholder="Password" required />
                            </div>


                            <div class="mb-30 text-center">
                                <button class="btn btn-danger m-2" type="button" @click="prevStep">Go Back</button>
                                <button class="btn btn-jb-primary m-2" type="submit">Continue</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section v-if="step === 3">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center mt-3">
                    <h2 class="section-title">{{ formTitle }}</h2>
                    <h3 class="banner-paragraph">Fill the following form to register</h3>
                </div>
                <div class="text-center">
                    <span class="signup-step" id="signup-step-1">1</span>
                    <span class="signup-step active" id="signup-step-2">2</span>
                    <span class="signup-step" id="signup-step-3">3</span>
                </div>
                <div class="form-content container-fluid">
                    <form @submit.prevent="nextStep">
                        <div class="row">
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="date" v-model="form.dob" placeholder="Date of Birth"
                                    required />
                            </div>

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.country" placeholder="Country"
                                    required />
                            </div>

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.region" placeholder="Region"
                                    required />
                            </div>

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.street"
                                    placeholder="Street Address" required />
                            </div>

                            <div class="mb-30 text-center mt-5">
                                <button class="btn btn-danger m-2" type="button" @click="prevStep">Go Back</button>
                                <button class="btn btn-jb-primary m-2" type="submit">Continue</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section v-if="step === 4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <h2 class="section-title">{{ formTitle }}</h2>
                    <h3 class="banner-paragraph">Fill the following form to register</h3>
                </div>
                <div class="text-center">
                    <span class="signup-step" id="signup-step-1">1</span>
                    <span class="signup-step" id="signup-step-2">2</span>
                    <span class="signup-step active" id="signup-step-3">3</span>
                </div>
                <div class="form-content container-fluid">

                    <form @submit.prevent="submitForm">

                        <div class="row mb-2" v-if="userType === 'student'">
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.educationLevel"
                                    placeholder="Education Level" required />
                            </div>
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.schoolName"
                                    placeholder="School Name" required />
                            </div>
                        </div>
                        <div class="row mb-2" v-if="userType === 'parent'">
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="email" v-model="form.studentEmail"
                                    placeholder="Student Email" required />
                            </div>

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.relationship"
                                    placeholder="Relationship" required />
                            </div>
                        </div>
                        <div class="row mb-2" v-if="userType === 'teacher'">

                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.school" placeholder="School" required />
                            </div>
                            <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                <input class="form-control" type="text" v-model="form.subject" placeholder="Subject" required />
                            </div>


                        </div>
                        <div class="mb-30 text-center mt-5">
                            <button class="btn btn-danger m-2" type="button" @click="prevStep">Go Back</button>
                            <button class="btn btn-jb-primary m-2" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</template>


<script>
export default {
    data() {
        return {
            step: 1,
            userType: localStorage.getItem('userType') || 'student',
            form: {
                firstName: '',
                lastName: '',
                mobile: '',
                email: '',
                password: '',
                dob: '',
                country: '',
                region: '',
                street: '',
                educationLevel: '',
                schoolName: '',
                studentEmail: '',
                relationship: '',
                school: '',
                subject: ''
            },
            userImages: {
                student: require('@/assets/images/signup_student.webp'),
                parent: require('@/assets/images/signup_parents.webp'),
                teacher: require('@/assets/images/signup_teacher.webp')
            }
        };
    },
    computed: {
        userImage() {
            return this.userImages[this.userType];
        },
        formTitle() {
            return `${this.userType.charAt(0).toUpperCase() + this.userType.slice(1)} Registration`;
        }
    },
    watch: {
        userType(newValue) {
            localStorage.setItem('userType', newValue);
        }
    },
    methods: {
        nextStep() {
            this.step++;
        },
        prevStep() {
            this.step--;
        },
        submitForm() {
            console.log('Submitting:', this.form);
            // Here you can integrate API call to submit data
        }
    }
};
</script>
