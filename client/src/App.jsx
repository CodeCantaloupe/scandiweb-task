import { Component } from "react";
import { ApolloSandbox } from "@apollo/sandbox/react";

export default class App extends Component {
  render() {
    return (
      <ApolloSandbox
        style={{ width: "100vw", height: "100vh" }}
        className="w-screen h-screen min-w-full min-h-full"
        initialEndpoint="http://localhost:8000/graphql"
      />
    );
  }
}
