import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import PostList from "./Component/PostList";
import FormDisplay from "./Component/FormDisplay";

export default function App() {

    return (
        <>
            <div className="bg-dark row" style={{height:'150px'}}>
                <br />
                <h1 className="text-white text-center">FetchApp</h1>
            </div>

            <FormDisplay />
            <PostList/>
        </>
    );
}