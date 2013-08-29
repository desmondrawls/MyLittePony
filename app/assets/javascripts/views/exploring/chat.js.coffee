class Mlp.Views.Chat extends Backbone.View
  template: JST['exploring/chat']

  initialize: ->
    Mlp.vent.on('everfree:chat', @clearChat, this)
    @collection.on('reset', @render, this)
    @collection.on('add', @appendMessage, this)
    @collection.on('change', @render, this)


  events:
    'submit #new_message': 'createMessage'


  render: ->
    @chat = @collection.filter (x) -> x.get('heroine') == $('#heroine-name').html()
    $(@el).html(@template())
    for message in @chat
      @appendMessage(message)
    this


  appendMessage: (message) =>
    if message.get('heroine') == $('#heroine-name').html()
      message_view = new Mlp.Views.Message(model: message)
      @$('#messages').append(message_view.render().el)


  createMessage: (event) ->
    event.preventDefault()

    attributes = 
      content: $('#new-message-content').val()
      heroine: $('#heroine-name').html()

    options =
      wait: true
      error: @handleError    

    @collection.create attributes, options
    $('#new-message-content').val("")


  handleError: (sent_message, response) -> 
    if response.status == 422
      errors = $.parseJSON(response.responseText).errors
      for attribute, messages of errors
        alert "#{attribute} #{message}" for message in messages

  clearChat: (new_scene) =>
    console.log("Clear the chat...")
    console.log(@chat)
    @finished_chat = @collection.filter (x) -> x.get('heroine') == $('#heroine-name').html()
    while @finished_chat.length > 0
      @finished_chat[0].trash()
      @finished_chat = @collection.filter (x) -> x.get('heroine') == $('#heroine-name').html()
    Mlp.vent.trigger('everfree:navigated', new_scene)
