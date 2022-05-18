import { useState } from "react";
import useForm from "../Hook/useForm";

export default function FormCreateUser() {

    const { handleChange, values, handleCreateUser } = useForm();

    return (
        <>
            <h1 className="text-center">Register</h1>
            <form action="" className="container" onSubmit={handleCreateUser}>
                <div className="mb-3">
                    <label htmlFor="name" className="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        className="form-control"
                        value={values.username}
                        onChange={handleChange}
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="password" className="form-label">Password</label>
                    <input
                        type="text"
                        name="password"
                        className="form-control"
                        value={values.password}
                        onChange={handleChange}
                    ></input>
                </div>
                <button className="btn btn-primary btn-lg btn-block">Register</button>
            </form>
        </>
    );
}