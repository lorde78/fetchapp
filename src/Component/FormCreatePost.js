import { useState } from "react";
import useForm from "../Hook/useForm";

export default function FormCreatePost() {

    const { handleChange, values, handlePost } = useForm();

    return (
        <>
            <h1 className="text-center">Post article</h1>
            <form action="" className="container" onSubmit={handlePost}>
                <div className="mb-3">
                    <label htmlFor="title" className="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        className="form-control"
                        value={values.title}
                        onChange={handleChange}
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="content" className="form-label">Content</label>
                    <input
                        type="text"
                        name="content"
                        className="form-control"
                        value={values.content}
                        onChange={handleChange}
                    ></input>
                </div>
                <button className="btn btn-primary btn-lg btn-block">Add Article</button>
            </form>
        </>
    );
}