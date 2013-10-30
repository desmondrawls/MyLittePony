describe "MainView", ->
  it "should render the main template", ->
    main_view = new Mlp.Views.Main
    main_view.render().el
    expect
    