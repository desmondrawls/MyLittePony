window.Mlp =
  Models: {}
  Collections: {}
  Views: {}
  Routers: {}
  initialize: -> 
  	new Mlp.Routers.Application
  	Backbone.history.start(pushState: true)

$(document).ready ->
  Mlp.initialize()
  faye = new Faye.Client "http://localhost:9292/faye"
  faye.setHeader 'Access-Control-Allow-Origin', 'http://localhost:3000'
  faye.subscribe "/receive", (data) ->
    $('#messages').append("<div>" + data.content + "</div>")
    height = 0
    $('#messages div').each (i, message) ->
      console.log(message)
      console.log("scroll to #{this}")
      console.log("scroll to #{@$}")
      height += parseInt($(this).height())
      console.log("the final height is #{height}")
    $('#messages').animate({scrollTop:height}, 500,'swing');